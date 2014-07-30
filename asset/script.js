$().ready(function() {
	$(".nav_slide").height($(".nav_box").height() + 19);//导航栏宽度调整
	$(".nav_slide_nav").height($(".nav_box").height() + 19 - 33);//导航栏宽度调整
	$(".carousel img").height($(".nav_box").height() + 15);//导航栏宽度调整
	
	$(".nav_slide_li").hover(function(){//年级控制
		$(".nav_slide_li").find("a").removeClass("nav_slide_li_current");	
		$(".nav_slide_li ul").hide();
		$(this).find("ul").show();
		$(this).find("a:eq(0)").addClass("nav_slide_li_current");
	});
	
	$(".nav_li").hover(function() {
        $(".nav_li").removeClass("nav_li_active");	//导航样式控制	
        $(this).addClass("nav_li_active");
		
		
		
		$(".nav_slide").addClass("nav_slide_hidden");//选择性展示专业
		$(".nav_slide:eq(" + $(this).index() + ")").removeClass("nav_slide_hidden");
		$(".nav_slide:eq(" + $(this).index() + ")").animate({width:"180px"});//动画
    });
	
	$('.carousel').carousel();

});
