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
	$(".nav_li").removeClass("nav_li_active");	
}
