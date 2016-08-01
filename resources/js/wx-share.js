/// weixin re-share support
document.addEventListener('WeixinJSBridgeReady', function(){
	var wx_desc = $('meta[name=description]').attr('content');
	var wx_url = window.location.href;
	var wx_title = document.title;
	var wx_appid = 'wx335dd0edfa16ae15';
	var wx_img_url = '', wx_img_width = 0, wx_img_height = 0;
	var $img = $('img#wx-share-image');
	if ($img.size() > 0) {
		wx_img_url = $img.get(0).src;
		wx_img_width = $img.width();
		wx_img_height = $img.height();
	}
	// 发送给好友
	WeixinJSBridge.on('menu:share:appmessage', function(argv){
		WeixinJSBridge.invoke('sendAppMessage', {
			'appid': wx_appid,
			'img_url': wx_img_url,
			'img_width': wx_img_width,
			'img_height':wx_img_height,
			'link': wx_url,
			'desc': wx_desc,
			'title': wx_title
		}, function(res){
			WeixinJSBridge.log(res.err_msg);
		});
	});
	// 分享到朋友圈  
	WeixinJSBridge.on('menu:share:timeline', function(argv){
		WeixinJSBridge.invoke('shareTimeline',{
			'img_url': wx_img_url,
			'img_width': wx_img_width,
			'img_height':wx_img_height,
			'link': wx_url,
			'desc': wx_desc,
			'title': wx_title
		}, function(res){
			WeixinJSBridge.log(res.err_msg);
		});
	});
	// 分享到微博
	WeixinJSBridge.on('menu:share:weibo', function(argv){
		WeixinJSBridge.invoke('shareWeibo',{
			'content': wx_desc,
			'url': wx_url
		}, function(res){
			WeixinJSBridge.log(res.err_msg);
		});
	});
}, false);
