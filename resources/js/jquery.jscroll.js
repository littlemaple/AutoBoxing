/**
 * jScroll - jQuery Plugin for Infinite Scrolling / Auto-Paging - v2.1.1
 * http://jscroll.com/
 *
 * Copyright 2011-2013, Philip Klauzinski
 * http://klauzinski.com/
 * Dual licensed under the MIT and GPL Version 2 licenses.
 * http://jscroll.com/#license
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @author Philip Klauzinski
 * @requires jQuery v1.4.3+
 *
 * Enhanced & modified by hightman - http://hightman.cn/
 */
;(function($) {

	// Define the jscroll namespace and default settings
	$.jscroll = {
		defaults: {
			debug: false,
			json: false,
			autoTrigger: true,
			touchTrigger: true,
			wheelTrigger: true,
			padding: 0,
			loadingHtml: '',
			nextSelector: 'a:last',
			contentSelector: '',
			pagingSelector: '',
			onBeforeLoad: function() {
			},
			onAfterLoad: function() {
			}
		}
	};

	// Constructor
	var jScroll = function($e, options) {

		// Private vars
		var _data = $e.data('jscroll'),
				_options = $.extend({}, $.jscroll.defaults, options, _data || {}),
				_isWindow = ($e.css('overflow-y') === 'visible'),
				_$next = $e.find(_options.nextSelector).first(),
				_$window = _isWindow ? $(window) : $e

		// Check next element
		if (!_$next.attr('href')) {
			_debug('warn', 'jScroll: nextSelector not found - ignoring');
			return $e;
		}

		// Initialization
		$e.data('jscroll', $.extend({}, _data, {initialized: true, waiting: false}));
		_wrapInnerContent();
		_preloadImage();

		var _$document = _isWindow ? $(document) : $e.find('.jscroll-inner');
		_bindTrigger();

		// ===================================================================================
		// = PRIVATE FUNCTIONS
		// ===================================================================================

		// Check if a loading image is defined and preload
		function _preloadImage() {
			var src = $(_options.loadingHtml).filter('img').attr('src');
			if (src) {
				var img = new Image();
				img.src = src;
			}
		}

		// Wrapper inner content, if it isn't already
		function _wrapInnerContent() {
			if (!$e.find('.jscroll-inner').length) {
				$e.contents().wrapAll('<div class="jscroll-inner" />');
			}
		}

		// Find the next link's parent, or add one
		function _nextWrap($next) {
			if (_options.pagingSelector) {
				return $next.closest(_options.pagingSelector);
			} else {
				var $parent = $next.parent().not('.jscroll-inner,.jscroll-added').addClass('jscroll-next-parent');
				if (!$parent.length) {
					$parent = $next.wrap('<div class="jscroll-next-parent" />').parent();
				}
				return $parent;
			}
		}

		// Bind next trigger event
		function _bindTrigger($next) {
			if (_options.autoTrigger) {
				// load when the nextSelector into viewport
				_$window.bind('scroll.jscroll', function() {
					return !$e.data('jscroll').waiting && _observe();
				});
			} else {
				// click
				_$next.bind('click.jscroll', function() {
					if (!$e.data('jscroll').waiting) {
						_load();
					}
					return false;
				});
				// touch up
				if (_options.touchTrigger) {
					_$document.bind('touchstart.jscroll', function(e) {
						if ($e.data('jscroll').waiting) {
							e.preventDefault();
						} else {
							var startY = e.originalEvent.changedTouches[0].pageY;
							_$document.bind('touchend.jscroll', function(e) {
								_$document.unbind('touchend.jscroll');
								if (startY - e.originalEvent.changedTouches[0].pageY > 40) {
									return _observe2();
								}
							});
						}
					});
				}
				// mousewheel up
				if (_options.wheelTrigger) {
					_$document.bind('mousewheel.jscroll', function(e, delta) {
						if ($e.data('jscroll').waiting) {
							e.preventDefault();
						} else if (delta < 0) {
							return _observe2();
						}
					});
				}
			}
		}

		// Remove the jscroll behavior and data from an element
		function _destroy() {
			_$document.unbind('.jscroll');
			_$window.unbind('.jscroll');
			$e.removeData('jscroll')
					.find('.jscroll-inner').children().unwrap()
					.filter('.jscroll-added').children().unwrap();
		}

		// Observer the wheel/touch event for when to trigger the next load
		function _observe2() {
			var data = $e.data('jscroll'),
					vHeight = _$window.scrollTop() + _$window.height(),
					fLeft = _$document.outerHeight() - vHeight,
					nTop = _$next.offset().top - _$window.scrollTop() - (_isWindow ? 0 : $e.offset().top),
					nHalf = _$window.height() / 2;
			if (fLeft <= 0 || nTop <= nHalf) {
				_debug('info', 'jScroll:', 'footLeft=', fLeft, ', nextTop=', nTop, '. Loading next request...');
				return _load();
			}
		}

		// Observe the scroll event for when to trigger the next load
		function _observe() {
			var data = $e.data('jscroll'),
					vHeight = _$window.scrollTop() + _$window.height(),
					nBot = _$next.offset().top + _$next.outerHeight() - (_isWindow ? 0 : $e.offset().top);
			if ((nBot + _options.padding) < vHeight) {
				_debug('info', 'jScroll:', 'nextBot=', nBot, ', vHeight=', vHeight, '. Loading next request...');
				return _load();
			}
		}

		// Check if the href for the next set of content has been set
		function _checkNextHref() {
			if (_$next.length == 0) {
				_debug('warn', 'jScroll: nextSelector not found - destroying');
				$e.jscroll.destroy();
				return false;
			} else
				return true;
		}

		// Get next href
		function _getNextHref() {
			var href = _$next.attr('href');
			if (_options.json) {
				href += (href.indexOf('?') < 0 ? '?' : '&') + 'json=1';
			} else if (_options.contentSelector != '') {
				href = href + ' ' + _options.contentSelector;
			}
			return href;
		}

		// Load as json data
		function _loadJson() {
			var $inner = $e.find('.jscroll-inner').first(),
					data = $e.data('jscroll'),
					nTop = $inner.outerHeight() + (_isWindow ? $e.offset().top : 0);
			data.waiting = true;
			return $e.animate({scrollTop: nTop}, 0, function() {
				_options.onBeforeLoad($e);
				$.getJSON(_getNextHref(), function(json) {
					_options.onAfterLoad.call(json, $e);
					data.waiting = false;
					if (json.length == 0) {
						_debug('warn', 'jScroll: empty json data - destroying');
						$e.jscroll.destroy();
					}
				}).fail(function() {
					_options.onAfterLoad.call(false, $e);
					data.waiting = false;
					_debug('warn', 'jScroll: faile to load json data - destroying');
					$e.jscroll.destroy();
				});
			});
		}

		// Load the next set of content, if available
		function _load() {
			if (_options.json) {
				return _loadJson();
			}
			var $inner = $e.find('.jscroll-inner'),
					data = $e.data('jscroll'),
					nTop = $inner.outerHeight() + (_isWindow ? $e.offset().top : 0),
					_$nextWrap = _nextWrap(_$next);
			data.waiting = true;
			$inner.append('<div class="jscroll-added" />')
					.children('.jscroll-added').last()
					.html('<div class="jscroll-loading">' + _options.loadingHtml + '</div>');
			return $e.animate({scrollTop: nTop}, 0, function() {
				_options.onBeforeLoad($e);
				$inner.children('.jscroll-added').last().load(_getNextHref(), function(r, status, xhr) {
					// replace $next attr & move to last

					var $next = $(this).find(_options.nextSelector).first();
					if ($next.length == 0 || status == 'error') {
						_$nextWrap.remove();
						_$next = $();
					} else {
						_$next.attr('href', $next.attr('href'));
						_nextWrap($next).remove();
						setTimeout(function() {
							_$nextWrap.appendTo($inner);
						}, 100);
					}
					_options.onAfterLoad.call(this, $e, status);
					if (status == 'error') {
						$(this).remove();
					}
					setTimeout(function() {
						data.waiting = false;
					}, 200);
					if (_$next.length == 0) {
						_debug('warn', 'jScroll: nextSelector not found - destroying');
						$e.jscroll.destroy();
					}
				});
			});
		}

		// Safe console debug - http://klauzinski.com/javascript/safe-firebug-console-in-javascript
		function _log(m) {
			if (typeof console === 'object' && (typeof m === 'object' || typeof console[m] === 'function')) {
				if (typeof m === 'object') {
					var args = [];
					for (var sMethod in m) {
						if (typeof console[sMethod] === 'function') {
							args = (m[sMethod].length) ? m[sMethod] : [m[sMethod]];
							console[sMethod].apply(console, args);
						} else {
							console.log.apply(console, args);
						}
					}
				} else {
					console[m].apply(console, Array.prototype.slice.call(arguments, 1));
				}
			}
		}

		function _debug(m) {
			if (_options.debug) {
				_log(m);
			}
		}

		// Expose API methods via the jQuery.jscroll namespace, e.g. $('sel').jscroll.method()
		$.extend($e.jscroll, {
			destroy: _destroy
		});
		return $e;
	};

	// Define the jscroll plugin method and loop
	$.fn.jscroll = function(m) {
		return this.each(function() {
			var $this = $(this), data = $this.data('jscroll');
			// Instantiate jScroll on this element if it hasn't been already
			if (!data || !data.initialized) {
				new jScroll($this, m);
			}
		});
	};
})(jQuery);
