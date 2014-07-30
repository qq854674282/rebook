<?php 
 include 'include/header.php';
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
 include '../function.php' ;
?>  
<div class="content">
    <input type="hidden" id="big_pic"/>
	<input type="hidden" id="activity_pic"/>
    <div class="header">
        <h1 class="page-title">广告位</h1>
    </div>
    <ul class="breadcrumb">
    	<li class="active">广告位</li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
<div class="row-fluid">
    <div class="block span12">
        <a href="#ad-1" class="block-heading" data-toggle="collapse">首页图片轮换	</a>
        <div id="ad-1" class="block-body collapse in">
			<table class="table">
              <thead>
                <tr>
                  <th>排序</th>
                  <th>标题</th>
                  <th>图片</th>
                  <th>文字</th>
                  <th>添加时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody id="big_list">
			  <?php
			  	$query="select * from big_picture order by image_order asc";
				$res=mysql_query($query);
				while($rows=mysql_fetch_array($res)){
			  ?>
                <tr>
                  <td><input type="text" value="<?php echo $rows['image_order'];?>" class="order_big" style="width:30px;"/></td>
                  <td><a href="#"><?php echo $rows['image_title'];?></a></td>
                  <td><a href="<?php echo "files/".$rows['image_url'];?>" target="_blank"><?php echo $rows['image_url'];?></a></td>
                  <td><?php echo $rows['image_desc'];?></td>
                  <td><?php echo date('Y-m-d H:i',$rows['add_time']);?></td>
                  <td>
				  	<input type="hidden" class="image_id" value="<?php echo $rows['image_id'];?>"/>
                  	<a href="#" title="删除" class="delete_big"><i class="icon-remove"></i></a>
					<a href="#" title="保存排序" class="save_big"><i class="icon-save"></i></a>
				  </td>
                </tr>
				<?php
				}
				?>
                
              </tbody>
			  <form>
                    <tr>
                      <td><input type="text" placeholder="排序" id="order_big" style="width:30px;"></td>
                      <td><input type="text" placeholder="标题" id="title_big" style="width:150px;"></td>
                      <td> <input id="fileupload" type="file" name="mypic"></td>
                      <td><input type="text" placeholder="说明" id="desc_big" style="width:200px;"></td>
                      <td><input type="text" placeholder="链接地址" id="link_big" style="width:200px;"></td>
                      <td><a href="#" title="确认添加" id="add_big"><i class="icon-plus"></i></a></td>
                    </tr>
                </form>
            </table>        	
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="block span12">
        <a href="#ad-2" class="block-heading" data-toggle="collapse">活动推广广告	</a>
        <div id="ad-2" class="block-body collapse in">
			<table class="table">
              <thead>
                <tr>
                  <th>序号</th>
                  <th>标题</th>
                  <th>图片</th>
                  <th>添加时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody id="activity_list">
			  <?php
			  	$query="select * from activity order by activity_order asc";
				$res=mysql_query($query);
				while($rows=mysql_fetch_array($res)){
			  ?>
                <tr>
                  <td><input type="text" value="<?php echo $rows['activity_order'];?>" class="activity_order" style="width:30px;"/></td>
                  <td><a href="#"><?php echo $rows['activity_title'];?></a></td>
                  <td><a href="<?php echo "files/".$rows['activity_image'];?>" target="_blank"><?php echo $rows['activity_image'];?></a></td>
                  <td><?php echo date('Y-m-d H:i',$rows['add_time']);?></td>
                  <td>
				  	<input type="hidden" class="activity_id" value="<?php echo $rows['activity_id'];?>"/>
                  	<a href="#" title="删除" class="delete_activity"><i class="icon-remove"></i></a>
					<a href="#" title="保存排序" class="save_activity"><i class="icon-save"></i></a>
                </tr>
				<?php
				}
				?>     
              </tbody>
			  <form>
                    <tr>
                      <td><input type="text" placeholder="排序" id="activity_order" style="width:30px;"></td>
                      <td><input type="text" placeholder="标题" id="activity_title" style="width:150px;"></td>
                      <td><input type="file" id="activity_up" name="mypic"></td>
                      <td><input type="text" placeholder="链接地址" id="activity_link"></td>
                      <td><a href="#" title="确认添加" id="add_activity"><i class="icon-plus"></i></a></td>
                    </tr>
                </form>
            </table>        	
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="block span12">
        <a href="#ad-3" class="block-heading" data-toggle="collapse">底部广告</a>
        <div id="ad-3" class="block-body collapse in">
			<table class="table" id="bottom_list">
				<thead>
                <tr>
                  <th>序号</th>
                  <th>链接</th>
				  <th>图片</th>
                  <th>添加时间</th>
                  <th>操作</th>
                </tr>
              </thead>
			  <tbody id="bottom_list">
			  <?php
			  	$query="select * from bottom order by bottom_order asc";
				$res=mysql_query($query);
				while($rows=mysql_fetch_array($res)){
			  ?>
                <tr>
                  <td><input type="text" value="<?php echo $rows['bottom_order'];?>" class="bottom_order" style="width:30px;"/></td>
                  <td><a href="<?php echo $rows['bottom_link'];?>"><?php echo $rows['bottom_link'];?></a></td>
                  <td><a href="<?php echo "files/".$rows['bottom_image'];?>" target="_blank"><?php echo $rows['bottom_image'];?></a></td>
                  <td><?php echo date('Y-m-d H:i',$rows['add_time']);?></td>
                  <td>
				  	<input type="hidden" class="bottom_id" value="<?php echo $rows['bottom_id'];?>"/>
                  	<a href="#" title="删除" class="delete_bottom"><i class="icon-remove"></i></a>
					<a href="#" title="保存排序" class="save_bottom"><i class="icon-save"></i></a>
				  </td>
                </tr>
				<?php
				}
				?>     
              </tbody>
                <form>
                    <tr>
					  <td><input type="text" id="bottom_order" style="width:50px;"></td>
                      <td><input type="file" id="bottom_pic" name="mypic"></td>
                      <td><input type="text" placeholder="链接地址" id="bottom_link"></td>
                      <td><a href="#" title="确认添加" id="add_bottom"><i class="icon-plus"></i></a></td>
                    </tr>
                </form>
            </table>        	
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>
<script type="text/javascript" src="lib/jquery.form.js"></script>
<script type="text/javascript">
$(function () {
	function datacheck(str){
	     if(str<10){
		    str='0'+str;
		 }
		 return str;
	}
	$("#fileupload").wrap("<form id='myupload' action='action.php' method='post' enctype='multipart/form-data'></form>");
    $("#add_big").click(function(){
		$("#myupload").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
        		
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		
    		},
			success: function(data) {
				 	$('#big_pic').val(data['pic']);
				 	var order_big=$('#order_big').val();
					var	title_big=$('#title_big').val();
					var	desc_big=$('#desc_big').val();
					var	link_big=$('#link_big').val();
					var pic_big=$('#big_pic').val();
					var d = new Date();
        			var date_str = d.getFullYear()+"-"+(datacheck(d.getMonth()+1))+"-"+datacheck(d.getDate())+" "+datacheck(d.getHours())+":"+datacheck(d.getMinutes());
   					$.ajax({
       					url:"add_big_ajax.php",
	   					type:"POST",
	   					data:{order_big:order_big,title_big:title_big,desc_big:desc_big,link_big:link_big,pic_big:pic_big},
	   					dataType:"json",
	   					error:function(){},
	   					success:function(data){
           					if(data['result']=="success"){
		       					$('#big_list').append('<tr><td><input type="text" value="'+order_big+'" class="activity_order" style="width:30px;"/></td><td><a href="'+link_big+'">'+title_big+'</a></td><td><a href="files/'+pic_big+'" target="_blank">'+pic_big+'</a></td><td>'+desc_big+'</td><td>'+date_str+'</td><td><input type="hidden" class="image_id" value="'+data['image_id']+'"/><a href="#" title="删除" class="delete_big"><i class="icon-remove"></i></a><a href="#" title="保存排序" class="save_big"><i class="icon-save"></i></a></tr>')
		   					}
	   					}
   					})
			},
			error:function(xhr){
				
			}
		});
   	   
	});
	$('.delete_big').live('click',function(){
		var tr=$(this).parent().parent();
   		var image_id=$(this).parent().find('.image_id').val();
   		$.ajax({
       		url:"delete_big_ajax.php",
	   		type:"POST",
	   		data:{image_id:image_id},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['result']=="success"){
		       		tr.remove();
		   		}
	   		}
   		})
	
	})
	$("#activity_up").wrap("<form id='activity_upload' action='action.php' method='post' enctype='multipart/form-data'></form>");
	$("#add_activity").click(function(){
		$("#activity_upload").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
        		
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		
    		},
			success: function(data) {
				    $('#activity_pic').val(data['pic']);
				 	var activity_order=$('#activity_order').val();
					var	activity_title=$('#activity_title').val();
					var	activity_link=$('#activity_link').val();
					var activity_pic=$('#activity_pic').val();
					var d = new Date();
        			var date_str = d.getFullYear()+"-"+(datacheck(d.getMonth()+1))+"-"+datacheck(d.getDate())+" "+datacheck(d.getHours())+":"+datacheck(d.getMinutes());
   					$.ajax({
       					url:"add_activity_ajax.php",
	   					type:"POST",
	   					data:{activity_order:activity_order,activity_title:activity_title,activity_link:activity_link,activity_pic:activity_pic},
	   					dataType:"json",
	   					error:function(){},
	   					success:function(data){
           					if(data['result']=="success"){
		       					$('#activity_list').append('<tr><td><input type="text" value="'+activity_order+'" class="activity_order" style="width:30px;"/></td><td><a href="'+activity_link+'">'+activity_title+'</a></td><td><a href="files/'+activity_pic+'" target="_blank">'+activity_pic+'</a></td><td>'+date_str+'</td><td><input type="hidden" class="image_id" value="'+data['image_id']+'"/><a href="#" title="删除" class="delete_big"><i class="icon-remove"></i></a><a href="#" title="保存排序" class="save_activity"><i class="icon-save"></i></a></td></tr>')
		   					}
	   					}
   					})
			},
			error:function(xhr){
				
			}
		});
   	   
	});
	$('.delete_activity').live('click',function(){
		var tr=$(this).parent().parent();
   		var activity_id=$(this).parent().find('.activity_id').val();
   		$.ajax({
       		url:"delete_activity_ajax.php",
	   		type:"POST",
	   		data:{activity_id:activity_id},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['result']=="success"){
		       		tr.remove();
		   		}
	   		}
   		})
	
	})
	$("#bottom_pic").wrap("<form id='bottom_upload' action='action.php' method='post' enctype='multipart/form-data'></form>");
	$("#add_bottom").click(function(){
		$("#bottom_upload").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
        		
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		
    		},
			success: function(data) {
					var	bottom_link=$('#bottom_link').val();
					var	bottom_order=$('#bottom_order').val();
					var bottom_pic=data['pic'];
					var d = new Date();
        			var date_str = d.getFullYear()+"-"+(datacheck(d.getMonth()+1))+"-"+datacheck(d.getDate())+" "+datacheck(d.getHours())+":"+datacheck(d.getMinutes());
   					$.ajax({
       					url:"add_bottom_ajax.php",
	   					type:"POST",
	   					data:{bottom_order:bottom_order,bottom_link:bottom_link,bottom_pic:bottom_pic},
	   					dataType:"json",
	   					error:function(){},
	   					success:function(data){
           					if(data['result']=="success"){
		       					$('#bottom_list').append('<tr><td><input type="text" value="'+bottom_order+'" class="activity_order" style="width:30px;"/></td><td><a href="'+bottom_link+'" target="_blank">'+bottom_link+'</a></td><td><a href="files/'+bottom_pic+'" target="_blank">'+bottom_pic+'</a></td><td>'+date_str+'</td><td><input type="hidden" class="image_id" value="'+data['image_id']+'"/><a href="#" title="删除" class="delete_big"><i class="icon-remove"></i></a><a href="#" title="保存排序" class="save_bottom"><i class="icon-save"></i></a></td></tr>')
		   					}
	   					}
   					})
			},
			error:function(xhr){
				
			}
		});
   	   
	});
	$('.delete_bottom').live('click',function(){
		var tr=$(this).parent().parent();
   		var bottom_id=$(this).parent().find('.bottom_id').val();
   		$.ajax({
       		url:"delete_bottom_ajax.php",
	   		type:"POST",
	   		data:{bottom_id:bottom_id},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['result']=="success"){
		       		tr.remove();
		   		}
	   		}
   		})
	
	})
});
$('.save_big').live('click',function(){
   		var tr=$(this).parent().parent();
   		var image_id=$(this).parent().find('.image_id').val();
		var order_big=tr.find('.order_big').val();
   		$.ajax({
       		url:"update_bigOrder_ajax.php",
	   		type:"POST",
	   		data:{image_id:image_id,order_big:order_big},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		alert('更新成功');
	   		}
   		})
})
$('.save_activity').live('click',function(){
   		var tr=$(this).parent().parent();
   		var activity_id=$(this).parent().find('.activity_id').val();
		var activity_order=tr.find('.activity_order').val();
   		$.ajax({
       		url:"update_activityOrder_ajax.php",
	   		type:"POST",
	   		data:{activity_id:activity_id,activity_order:activity_order},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		alert('更新排序成功');
	   		}
   		})
})
$('.save_bottom').live('click',function(){
   		var tr=$(this).parent().parent();
   		var bottom_id=$(this).parent().find('.bottom_id').val();
		var bottom_order=tr.find('.bottom_order').val();
   		$.ajax({
       		url:"update_bottomOrder_ajax.php",
	   		type:"POST",
	   		data:{bottom_id:bottom_id,bottom_order:bottom_order},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		alert('更新排序成功');
	   		}
   		})
})
</script>