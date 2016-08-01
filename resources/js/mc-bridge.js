(function (callback) {
	if (window.mCloudJSBridge) {
		callback(mCloudJSBridge);
	} else {
		document.addEventListener('mCloudJSBridgeReady', function () {
			callback(mCloudJSBridge);
		}, false);
	}
})(function (bridge) {
	var mCloud = {};
	// init data from NativeApp
	bridge.init(function (data, responseCallback) {
		if (typeof data === 'string') {
			data = JSON.parse(data);
		}
		if (typeof data === 'object') {
			for (var key in data) {
				mCloud[key] = data[key];
			}
		}
		// send init data to NativeApp
		//var responseData = {};
		//responseCallback(responseData);
	});

	// register js handlers for NativeApp
	/*bridge.registerHandler('testHandler', function (data, responseCallback) {
		// recv data from NativeApp
		// send responseData to NativeApp
		var responseData = {'Javascript Says': 'Right back atcha!  hahahhaahahah'};
		responseCallback(responseData);
	});*/

	// create client handler
	mCloud.getAppVersion = function () {
		return mCloud.version;
	};
	mCloud.setTitle = function (title) {
		bridge.callHandler('setTitle', title + '', function (res) {
			// nothing to do
		});
	};
	mCloud.close = function () {
		bridge.callHandler('close', null, function (res) {
			// nothing to do
		});
	};
	mCloud.hideShareMenu = function () {
		bridge.callHandler('hideShareMenu', null, function (res) {
			// nothing to do
		});
	};
	mCloud.showShareMenu = function () {
		bridge.callHandler('showShareMenu', null, function (res) {
			// nothing to do
		});
	};
	mCloud.showServiceMessage = function (id) {
		bridge.callHandler('showServiceMessage', id + '', function (res) {
			// nothing to do
		});
	};
	// response callback
	mCloud.registerCall = function (name, func) {
		if (typeof func !== 'function') {
			return;
		}
		bridge.registerHandler(name, function (data, responseCallback) {
			var retValue = func.call(bridge, data);
			responseCallback(JSON.stringify(retValue));
		});
	};
	window.mCloud = mCloud;
	if (jQuery) {
		jQuery(window).trigger('mCloud.init');
	}
});
