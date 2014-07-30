<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
?> 
<div class="content">   
    <div class="header">
        <h1 class="page-title">管理员列表</h1>
    </div>   
    <ul class="breadcrumb">
    	<li>管理员</li><span class="divider">/</span>
    	<li class="active">管理员列表</li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
<div class="row-fluid">
    <div class="block span12">
        <a href="#ad-1" class="block-heading" data-toggle="collapse">管理员列表	</a>
        <div id="ad-1" class="block-body collapse in">
			<table class="table">
              <thead>
                <tr>
                  <th>上次登录时间</th>
                  <th>用户名称</th>
                  <th>密码</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  $query="select admin_id,admin_name,login_time,password from admin where admin_type=0 and status=0";
			  $res=mysql_query($query);
			  while($rows=mysql_fetch_array($res)){
			  ?>
                <tr>
				  <input type="hidden" value="<?php echo $rows['admin_id']?>" class="admin_id" />
                  <td><?php echo date('Y-m-d H:i',$rows['login_time']);?></td>
                  <td><?php echo $rows['admin_name'];?></td>
                  <td><?php echo $rows['password'];?></td>
                  <td>
                  	<a href="#" title="删除" class="delete">删除</a>&nbsp;|&nbsp;
					<a href="#" title="禁用" class="forbidden">禁用</a>
                </tr>
			  <?php
			  }
			  ?>
              </tbody>
            </table>        	
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>
<script>
$('.delete').click(function(){
	var tr=$(this).parent().parent();
	var admin_id=tr.find('.admin_id').val();
	$.ajax({
       		url:"delete_admin_ajax.php",
	   		type:"POST",
	   		data:{admin_id:admin_id},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['result']=="success"){
		       		tr.remove();
		   		}
	   		}
   	})
})
$('.forbidden').click(function(){
	var tr=$(this).parent().parent();
	var admin_id=tr.find('.admin_id').val();
	$.ajax({
       		url:"forbidden_admin_ajax.php",
	   		type:"POST",
	   		data:{admin_id:admin_id,status:1},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['result']=="success"){
					tr.remove();
		   		}
	   		}
   	})
})
</script>