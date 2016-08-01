$(function() {
	//unslider
	$('.section3-mobile').unslider({
		speed: 500, //  The speed to animate each slide (in milliseconds)
		delay: 3000, //  The delay between slide animations (in milliseconds)
		complete: function() {
		}, //  A function that gets called after every slide animation
		keys: false, //  Enable keyboard (left, right) arrow shortcuts
		dots: true, //  Display dot navigation
		fluid: false	//  Support responsive design. May break non-responsive designs
	});

	//hover改变背景图
	$('.about-employ ul').hover(function() {
		var index = $('.about-employ ul').index(this);
		$('.about-employ-left').eq(index).css("background", "url(img/v23/image_index_43.jpg) repeat-x");
		$('.about-employ-right').eq(index).css("background", "url(img/v23/image_index_43.jpg) repeat-x");
	}, function() {
		$('.about-employ-left').eq(index).css("background", "url(img/v23/image_index_42.jpg) repeat-x");
		$('.about-employ-right').eq(index).css("background", "url(img/v23/image_index_42.jpg) repeat-x");
	});

	
});

//两幅动态banner图轮播
$(function() {
	var timer = null;
	var now = 0;
	var $oLi = $('.section1 ul li')
	$oLi.eq(now).css("display", "block");
	timer = setInterval(function() {
		now++;
		if (now === $oLi.size()) {
			now = 0;
		}
		$oLi.eq(now).stop(true, true).fadeIn(1000).siblings('li').hide();
	}, 4000);
	/*$oLi.hover(function(){
	 clearInterval(timer);
	 },function(){
	 timer=setInterval(function(){
	 now++;
	 if(now==$oLi.size()){
	 now=0;
	 }
	 $oLi.eq(now).stop(true,true).fadeIn(1000).siblings('li').hide();
	 },4000);
	 })*/
});

//产品特征介绍模块
$(function() {
	var $text = $('.section9 ul li');
	$text.mouseover(function() {
		var index = $text.index(this);
		$text.eq(index).addClass('on').siblings('li').removeClass('on');
		var aTitle = $text.eq(index).text();
		var aContent = $text.eq(index).attr('data-text');
		$('.section9-model h4').html(aTitle);
		$('.section9-model p').html(aContent);
	});
});

//返回顶部悬浮窗
$(function() {
	$(window).scroll(function() {
		var scrollH = $(this).scrollTop();
		if (scrollH >= 400) {
			$('.return-top').stop(true).show().animate({right: '2%', opacity: 1}, 200);
		} else {
			$('.return-top').stop(true).animate({right: 0, opacity: 0}, 200, function() {
				$('.return-top').hide();
			});
		}
	});
	$('.return-top a').click(function() {
		$('body, html').animate({scrollTop: 0}, 800);
	});
});

$(function() {
	//append改变html结构
	$('.submenu-pro').append($('.product-menu-all'));
	$('.submenu-con').append($('.contract-menu-all'));
	//下拉菜单
	var url = window.location.href, isPro = false, isCon = false;
	if (url.indexOf('/product') > 0) {
		$('.product-menu-all').show();
		isPro = true;
	} else if (url.indexOf('/contact') > 0 || url.indexOf('/download') > 0) {
		$('.contract-menu-all').show();
		isCon = true;
	}
	// 菜单动画
	var timer = null;
	if (isPro) {
		$('.submenu-con').hover(function(){
			$('.product-menu-all').removeAttr('style');
			$('.submenu-con .contract-menu-all').stop(true,true).slideDown(600);
		},function(){
			$('.contract-menu-all').removeAttr('style');
			$('.submenu-pro .product-menu-all').stop(true,true).slideDown(600);
		});
	} else if (isCon) {
		$('.submenu-pro').hover(function(){
			$('.contract-menu-all').removeAttr('style');
			$('.submenu-pro .product-menu-all').stop(true,true).slideDown(600);
		},function(){
			$('.product-menu-all').removeAttr('style');
			$('.submenu-con .contract-menu-all').stop(true,true).slideDown(600);
		});
	} else {
		$('.submenu-con').hover(function(){
			$('.product-menu-all').removeAttr('style');
			$('.submenu-con .contract-menu-all').stop(true,true).slideDown(600);
		},function(){
			$('.submenu-con .contract-menu-all').stop(true).slideUp(600);
		});
		$('.submenu-pro').hover(function(){
			$('.contract-menu-all').removeAttr('style');
			$('.submenu-pro .product-menu-all').stop(true,true).slideDown(600);
		},function(){
			$('.submenu-pro .product-menu-all').stop(true).slideUp(600);
		});
	}

	//滚动条，菜单置顶
	//var defaultTop=$('.product-menu-all').offset().top;
	$(window).scroll(function(){
		var scrollH=$(window).scrollTop();
		if(isPro){
			if(scrollH >=100){
				$('.product-menu-all').css({"position": "fixed",'top':0});
			}else{
				$('.product-menu-all').css({"position": "absolute",'top':100});
			}
		}else if(isCon){
			if(scrollH >=100){
				$('.contract-menu-all').css({"position": "fixed",'top':0});
			}else{
				$('.contract-menu-all').css({"position": "absolute",'top':100});
			}
		}
	});

	//判断浏览器
	var isIE6=!-[1,]&&!window.XMLHttpRequest;
	if(isIE6) 
	{ 
		alert("请升级您的浏览器！"); 
	}

	//产品list居中
	var windowWidth = $(window).width();
	var listWidth = $('.section9 ul').width();
	var differWidth = windowWidth - listWidth;
	$('.section9 ul').css('left',differWidth/2);
});

