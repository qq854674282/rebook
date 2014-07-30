<?php 
include_once('function.php');
checkUser();
$user_id=$_COOKIE['user_id'];
$sell_num=getSellNumById($user_id);
checkSellnum($sell_num);
$title="发布图书";
include_once('include/header.php');
?>
    <script type="text/javascript" charset="utf-8" src="asset/lib/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="asset/lib/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="asset/lib/ueditor/lang/zh-cn/zh-cn.js"></script>
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
        <form class="add_book" id="add_book_submit" action="add_book_do.php" method="post" enctype="multipart/form-data">
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
                <select name="zone" id="zone">
                	<option value="东校区" selected="selected">交大东校区</option>
                    <option value="西校区">交大西校区</option>
                </select>
                <div class="clearfix"></div>
                <label>物流方式：</label>
                <select name="send_type" id="send_type">
                	<option value="自己联系" selected="selected">自己联系</option>
                </select>
                <div class="clearfix"></div>                
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <p class="span2">当您选择“校园物流”时我们会在你所注售价中扣除2元作为物流费用。</p>
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
            <label>图书封面：</label>
            <input type="file" style="float:none" name="book_image" id="book_image">
            <div class="clearfix"></div>
            <p>图片推荐尺寸：高360px，宽270px。请突出图书的封面主体。</p><br>
            <label>详情说明：</label>
            <br><br>
   		 	<script id="editor" type="text/plain" style="width:600px;height:300px;" name="book_desc"></script>  
            <br><br>
            <p class="alert hide" id="alert_info">错误信息</p>            
            <a id="form_submit" class="btn">发布该图书</a>
		</form>
    </div>
	<div class="slide_content">
		<?php include_once('include/latest_book_list.php');?>
    </div>
</div>
<?php
$query="select ";
?>
<style>
#city_c {
	margin-top:3px;
}
</style>
<script src="asset/index_none.js"></script>
<script src="asset/lib/jquery.cxselect/js/jquery.cxselect.min.js"></script>
<script>
$.ajax({
       		url:"query_switch_ajax.php",
	   		type:"POST",
	   		data:{s_id:1},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['status']==0){
		       		$('#send_type').append('<option value="校园物流" id="wuliu">校园物流</option>');
		   		}
	   		}
})
$('#zone').change(function(){
	if($(this).val()=="东校区"){
		s_id=1;
	}else{
		s_id=2;
	}
	$('#wuliu').remove();
   	$.ajax({
       		url:"query_switch_ajax.php",
	   		type:"POST",
	   		data:{s_id:s_id},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['status']==0){
		       		$('#send_type').append('<option value="校园物流" id="wuliu">校园物流</option>');
		   		}
	   		}
   	})
})
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
		  {"n" : "法学院/人文学院", "s" : [
			  {"n" : "法学（卓越复合班）"},
			  {"n" : "法学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "社会学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "视觉传达设计", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "环境设计", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "雕塑", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "书法学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "艺术设计", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "汉语言文学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "哲学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
		  ]},	
		  {"n" : "外国语学院", "s" : [
			  {"n" : "法语", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "德语", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "日语", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "英语（英德方向）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "英语（英法方向）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "英语（英俄方向）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "英语", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
		  ]},	
		  {"n" : "理学院/数学学院/航天学院", "s" : [
			  {"n" : "数学与应用数学（试验班）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "数学与应用数学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "信息与计算科学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "物理学（试验班）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "应用物理学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "应用化学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "工程力学（硕）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "工程结构分析/工程力学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "飞行器设计与工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
		  ]},	
		  {"n" : "材料学院/化工学院", "s" : [
			  {"n" : "材料类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "材料物理", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "材料科学与工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "化学工程与工艺", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "过程装备与控制工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
		  ]},	
		  {"n" : "机械学院/能动学院", "s" : [
			  {"n" : "机械类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "工业设计", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "机械工程及自动化/机械工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "车辆工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "测控技术与仪器", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "能源动力类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "核工程与核技术", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "能源动力系统及自动化/能源与动力工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "环境工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "新能源科学与工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
		  ]},	
		  {"n" : "电信学院/软件学院/电气学院", "s" : [
			  {"n" : "电子信息类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "信息工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "自动化", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "软件工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "计算机科学与技术", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "电子科学与技术", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "光信息科学与技术/光电信息科学与工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "微电子学/微电子科学与工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "物联网工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "电气工程及其自动化（硕）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "钱学森班"},
			  {"n" : "电气工程及其自动化", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},				
			  {"n" : "测控技术与仪器", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},				
		  ]},	
		  {"n" : "生命学院/人居学院", "s" : [
			  {"n" : "生命科学与技术基地班/生物科学类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "生物医学工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "生物工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "建筑学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},				  
				  {"n" : "其它"}
			  ]},
			  {"n" : "土木工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "建筑环境与设备工程/建筑环境与能源应用工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "地球环境科学/环境科学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
		  ]},	
		  {"n" : "经金学院/公管学院/管理学院", "s" : [
			  {"n" : "经济学类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "财政学类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "金融学类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "经济与贸易类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "电子商务类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "统计学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "经济学（数量经济与金融）"},
			  {"n" : "会计学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "会计学（ACCA）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "管理科学与工程类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "工商管理类（硕）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "公共管理类", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},				
		  ]},	
		  {"n" : "医学院", "s" : [
			  {"n" : "宗濂班"},
			  {"n" : "学博（军）"},
			  {"n" : "临床医学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "大七"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "临床医学（口腔医学）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "大七"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "临床医学（预防医学）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "大六"},
				  {"n" : "大七"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "护理学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "临床医学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "临床医学（专项计划）", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "口腔医学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "法医学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "大五"},
				  {"n" : "其它"}
			  ]},				
			  {"n" : "药学", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
			  {"n" : "制药工程", "s" : [
				  {"n" : "大一"},
				  {"n" : "大二"},
				  {"n" : "大三"},
				  {"n" : "大四"},
				  {"n" : "其它"}
			  ]},
		  ]},	
	  ]},
	  {"n" : "公共课", "s" : [
		  {"n" : "思想政治教育与国防教育", "s" : [
				  {"n" : "毛泽东思想和中国特色社会主义理论体系概论"},
				  {"n" : "思想道德修养和法律基础"},
				  {"n" : "国防教育"},
				  {"n" : "马克思主义基本原理"},
				  {"n" : "中国近代史纲要"},
				  {"n" : "形式与政策"}
		  ]},
		  {"n" : "英语", "s" : [
				  {"n" : "大学英语"},
				  {"n" : "高级英语"},
				  {"n" : "大学英语口语"},
				  {"n" : "英语写作"},
				  {"n" : "高级英语视听说"},
				  {"n" : "英汉互译"},
				  {"n" : "欧洲文化渊源"},
				  {"n" : "西方礼仪文化"},
				  {"n" : "英美文化"},
				  {"n" : "新闻英语"},
				  {"n" : "商务英语"},
		  ]},			
		  {"n" : "大学计算机基础"},
		  {"n" : "体育"},
		  {"n" : "基础通识类选修课"},
		  {"n" : "基础通识类核心课"},			
	  ]},
	  {"n" : "考研", "s" : [
		  {"n" : "思想政治理论"},
		  {"n" : "外语"},			
		  {"n" : "数学"},
		  {"n" : "专业课"},
	  ]},
	  {"n" : "其它", "s" : [
		  {"n" : "语言/出国"},
		  {"n" : "小说杂志"},			
		  {"n" : "工具书"},
		  {"n" : "考证"},
	  ]}	  
  ]
});
</script>
<script>
$("#form_submit").click(function(){
	var errorType = 0;
	var errorInfo = "ok";
	var fileName=new String($('#book_image').val());
	var extension=new String(fileName.substring(fileName.lastIndexOf(".")+1,fileName.length));
	var imageFlag=false;
	if(extension=="jpg"||extension=="png"||extension=="bmp"||extension=="gif"||extension=="jpeg"){
		imageFlag = true;
	}
	if(!imageFlag){
		errorInfo = "图书封面只能上传图片";errorType = 1;
	}
	if($("#add_book_submit input[name='book_name']").val().length<1){
		errorInfo = "请输入正确的图书名称。";errorType = 1;
	}
	if($("#add_book_submit input[name='author']").val().length<1){
		errorInfo = "请输入正确的作者姓名。";errorType = 1;
	}
	if($("#add_book_submit input[name='publisher']").val().length<1){
		errorInfo = "请输入正确的出版社。";errorType = 1;
	}
	if($("#add_book_submit input[name='version']").val().length<1){
		errorInfo = "请输入正确的版本。";errorType = 1;
	}
	if(isNaN($("#add_book_submit input[name='price']").val())){
		errorInfo = "请输入正确的出售价格。";errorType = 1;
	}
	if($("#add_book_submit input[name='book_image']").val().length<1){
		errorInfo = "请上传图书封面。";errorType = 1;
	}
	if($(".first").val() == "请选择图书分类"){
		errorInfo = "请选择图书分类。";errorType = 1;
	}
	
	
	if(errorType != 0){
		$("#alert_info").html(errorInfo);
		$("#alert_info").removeClass("hide");
	}else $("#add_book_submit").submit();
});
</script>
<?php include 'include/footer.php' ?>
