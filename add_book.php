<?php 
$title="发布图书";
include_once('function.php');
//checkUser();
include_once('include/header.php');
?>
    <script type="text/javascript" charset="utf-8" src="asset/lib/ueditor1_3_6-utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="asset/lib/ueditor1_3_6-utf8-php/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="asset/lib/ueditor1_3_6-utf8-php/lang/zh-cn/zh-cn.js"></script>
<br><br>
<div class="clearfix"></div>
<div class="container">
    <div class="main_content">
        <div class="book_line">
            <div class="book_line_title">
                <a href="#" class="book_line_title_1 pull-left">出售图书</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <form class="add_book" action="add_book_do.php" method="post" enctype="multipart/form-data">
        	<div class="pull-left">
              <fieldset>
            	<label>图书名称：</label>
                <input type="text" name="book_name">
                <div class="clearfix"></div>
            	<label>作者姓名：</label>
                <input type="text" name="author">
                <div class="clearfix"></div>          
            	<label>出版社：</label>
                <input type="text" name="publisher">
                <div class="clearfix"></div>
            	<label>版本：</label>
                <input type="text" name="version">
                <div class="clearfix"></div>
            	<label>出售价格：</label>
                <div class="input-append pull-right">
                    <input id="appendedInput" type="text" style="float:none; width:180px;" name="price">
                    <span class="add-on">元</span>
                </div>
                <div class="clearfix"></div>
                <label>发布区域：</label>
                <select name="zone">
                	<option value="1">交大东校区</option>
                    <option value="2">交大西校区</option>
                </select>
                <div class="clearfix"></div>
                <label>物流方式：</label>
                <select name="send_type">
                	<option value="1">自己联系</option>
                    <option value="2">校园物流</option>
                </select>
              </fieldset>
                <div class="clearfix"></div>                                      
            </div>
        	<div class="pull-left book_kind">
            	<label class="book_kind_title">图书分类</label>
                <div class="clearfix"></div>                
                <fieldset id="city_c">
                    <select class="first" disabled="disabled" name="class_1"></select>
                    <select class="second" disabled="disabled" name="class_2"></select>
                    <select class="third" disabled="disabled" name="class_3"></select>
                    <select class="fourth" disabled="disabled" name="class_4"></select>
                </fieldset>
                <p>说明：请仔细选择分类，各专业都在使用的书请尽量归类在“公共课”或“外语资料”中，有利于您的图书被更多的人看到。</p>          
            </div>
            <div class="clearfix"></div>
            <br>
<!--        <label>附加说明：</label>
            <textarea name="book_desc"></textarea>
            <div class="clearfix"></div><br>-->
            <label>图书封面：</label>
			<!--<iframe src="book_photo.php" class="add_book_photo"></iframe><!--Jcrop 插件，用来剪切图片-->
            <input type="file" style="float:none" name="book_image">
            <div class="clearfix"></div>
            <p>图片推荐尺寸：高360px，宽270px。请突出图书的封面主体。</p><br>
<!--        <label>附加图片：</label>
            <input type="file" style="float:none">
            <div id="add_more_photo_box"></div>
            <a href="javascript:;" id="add_more_photo">再添加一张图片</a>
            <script>
			$("#add_more_photo").click(function(){
				$("#add_more_photo_box").html($("#add_more_photo_box").html() + "<br><label>附加图片：</label><input type='file' style='float:none'><br>");
			});
			</script>-->
   		 	<script id="editor" type="text/plain" style="width:600px;height:300px;"></script>
            
            <br><br>
            <button type="submit" class="btn">发布该图书</button>
		</form>
    </div>
	<div class="slide_content">
		<?php include_once('include/latest_book_list.php');?>
    </div>
</div>
<style>
#city_c {
	margin-top:3px;
}
</style>
<script src="asset/index_none.js"></script>
<script src="asset/lib/jquery.cxselect/js/jquery.cxselect.min.js"></script>
<script>
UE.getEditor('editor');
$("#city_c").cxSelect({
	selects : ["first", "second", "third", "fourth"],
	required : true,
	url : [
		{"n" : "请选择图书分类", "s" : [
			{"n" : "", "s" : [
				{"n" : "", "s" : [
					{"n" : "", "s" : [
						{"n" : "", "s" : [
							{"n" : "", "s" : [
								{"n" : "", "s" : [
									{"n" : "", "s" : [
										{"n" : "", "s" : [
											{"n" : "", "s" : [
												{"n" : ""}
											]}
										]}
									]}
								]}
							]}
						]}
					]}
				]}
			]}
		]},
		{"n" : "专业书籍", "s" : [
			{"n" : "电信学院/软件学院", "s" : [
				{"n" : "自动化", "s" : [
					{"n" : "大一"},
					{"n" : "大二"},
					{"n" : "大三"},
					{"n" : "大四"}
				]},
				{"n" : "计算机科学与技术", "s" : [
					{"n" : "大一"},
					{"n" : "大二"},
					{"n" : "大三"},
					{"n" : "大四"}
				]}
			]},
			{"n" : "电气学院", "s" : [
				{"n" : "电气工程及自动化", "s" : [
					{"n" : "大一"},
					{"n" : "大二"},
					{"n" : "大三"},
					{"n" : "大四"}
				]},
				{"n" : "电测控", "s" : [
					{"n" : "大一"},
					{"n" : "大二"},
					{"n" : "大三"},
					{"n" : "大四"}
				]}
			]},
			{"n" : "人文学院", "s" : [
				{"n" : "汉语言文学", "s" : [
					{"n" : "大一"},
					{"n" : "大二"},
					{"n" : "大三"},
					{"n" : "大四"}
				]},
				{"n" : "新闻传媒", "s" : [
					{"n" : "大一"},
					{"n" : "大二"},
					{"n" : "大三"},
					{"n" : "大四"}
				]}
			]},			
		]},
		{"n" : "公共课", "s" : [
			{"n" : "英语", "s" : [
					{"n" : "大一"},
					{"n" : "大二"},
					{"n" : "大三"},
					{"n" : "大四"}
			]},
			{"n" : "数学","s" : [
					{"n" : "大一"},
					{"n" : "大二"},
					{"n" : "大三"},
					{"n" : "大四"}
			]},
			{"n" : "政治","s" : [
					{"n" : "大一"},
					{"n" : "大二"},
					{"n" : "大三"},
					{"n" : "大四"}
			]},			
		]},
		{"n" : "外语资料", "s" : [
			{"n" : "英语"},
			{"n" : "日语"},
			{"n" : "德语"},
		]},		
	]
});
</script>
<?php include 'include/footer.php' ?>
