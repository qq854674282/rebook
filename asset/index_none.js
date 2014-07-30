$(".nav_main").click(function(){//主导航按钮样式及切换
	$(".nav_box").slideToggle();
	if($(".nav_main").hasClass("nav_current")){
		$(".nav_main").removeClass("nav_current");
	}else {
		$(".nav_main").addClass("nav_current");
	}
});


var t;//导航栏定时消失
$(".nav_box").hover(function(){
	clearTimeout(t);
	},function(){
	t=setTimeout("nav_clear()",500);
});

$(".nav_slide").hover(function(){
	clearTimeout(t);	
},function(){
		t=setTimeout("nav_clear()",500);
	});
	
var nav_clear = function(){
	$(".nav_slide").addClass("nav_slide_hidden");
	$(".nav_box").hide();
	$(".nav_main").removeClass("nav_current");
}

//$().ready(function(e) {
//    nav_clear();
//});












jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        var path = options.path ? '; path=' + options.path : '';
        var domain = options.domain ? '; domain=' + options.domain : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};