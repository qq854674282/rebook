<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
?>   
<div class="content">
    
    <div class="header">
        <h1 class="page-title">首页展示</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li class="active">首页展示</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                    



<div class="row-fluid">
    <div class="block span12">
        <a href="#abd-1" class="block-heading" data-toggle="collapse">首页图书分类展示	</a>
        <div id="abd-1" class="block-body collapse in">
			<table class="table">
              <thead>
                <tr>
                  <th>标题</th>
                  <th>分类</th>
                  <th>行数</th>
				  <th>排序</th>
                  <th>添加时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			   <?php
			  	$query="select * from info_column order by weight asc";
				$res=mysql_query($query);
				while($rows=mysql_fetch_array($res)){
			  ?>
                <tr>
                  <td><input type="text" value="<?php echo $rows['column_name'];?>" class="column_name" /></td>
                  <td>
				  <?php
				  	$academy_name=getNameById('academy',$rows['academy_id']);
					$major_name=getNameById('major',$rows['major_id']);
					echo $academy_name."--".$major_name;
				  ?>
				  </td>
                  <td><input type="text" value="<?php echo $rows['num']/5;?>" class="num" /></td>
				  <td><input type="text" value="<?php echo $rows['weight'];?>" class="weight" /></td>
                  <td><?php echo date('Y-m-d H:i',$rows['add_time']);?></td>
                  <td>
				  	<input type="hidden" value="<?php echo $rows['column_id'];?>" class="column_id" />
                  	<a href="#" title="删除" class="delete"><i class="icon-remove"></i></a>
                    <a href="#" title="保存修改" class="save"><i class="icon-save"></i></a>
                </tr>
				<?php
				}
				?>         
                <form action="add_column_do.php" method="post" name="addForm">
                    <tr>
                      <td><input type="text" placeholder="标题" name="title"></td>
                      <td colspan="2">
                          <fieldset id="city_c">
                              <select class="first" disabled="disabled" name="class_1"></select>
                              <select class="second" disabled="disabled" name="class_2"></select>
                              <select class="third" disabled="disabled" name="class_3"></select>
                              <select class="fourth" disabled="disabled" name="class_4"></select>
                          </fieldset>                      
                      </td>
					  <td><input type="text" placeholder="排序" name="weight"></td>
                      <td><input type="text" placeholder="展示行数" name="num"></td>  
                      <td><a href="#" title="确认添加" id="sub"><i class="icon-plus"></i></a></td>
                    </tr>
                </form>
              </tbody>
            </table>        	
        </div>
    </div>
</div>
<script src="../asset/lib/jquery.cxselect/js/jquery.cxselect.min.js"></script>
<script>
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
$('#sub').click(function(){
	addForm.submit();
})
$('.delete').click(function(){
   		var tr=$(this).parent().parent();
   		var column_id=$(this).parent().find('.column_id').val();
   		$.ajax({
       		url:"delete_column_ajax.php",
	   		type:"POST",
	   		data:{column_id:column_id},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['result']=="success"){
		       		tr.remove();
		   		}
	   		}
   		})
})
$('.save').click(function(){
   		var tr=$(this).parent().parent();
   		var column_id=$(this).parent().find('.column_id').val();
		var column_name=tr.find('.column_name').val();
		var num=tr.find('.num').val();
		var weight=tr.find('.weight').val();
   		$.ajax({
       		url:"update_column_ajax.php",
	   		type:"POST",
	   		data:{column_id:column_id,column_name:column_name,num:num,weight:weight},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		alert('修改成功');
	   		}
   		})
})
</script>
<?php include 'include/footer.php' ?>
