<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
?>  
<div class="content">
    
    <div class="header">
        <h1 class="page-title">功能开关</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li class="active">功能开关</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                    



<div class="row-fluid">
    <div class="block span12">
        <a href="#ad-1" class="block-heading" data-toggle="collapse">功能开关</a>
        <div id="ad-1" class="block-body collapse in">
        	<br>
			<table class="table">
              <thead>
                <tr>
                  <th>功能</th>
                  <th>现在状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php 
			  $query="select status from switch where s_id=1";
			  $res=mysql_query($query);
			  $row=mysql_fetch_array($res);
			  $status=$row['status'];
			  ?>
                <tr>
                  <td>交大东校区“校园物流”</td>
                  <td class="status_1"><?php if($status==0) echo "开"; if($status==1) echo "关";?></td>
                  <td>
                  	<a href="#" title="开" id="east_on"><i class="icon-ok"></i>开<input type="hidden" value="1" class="s_id" /><input type="hidden" value="0" class="status" /></a>
                  	<a href="#" title="关" id="east_off"><i class="icon-remove"></i>关<input type="hidden" value="1" class="s_id" /><input type="hidden" value="1" class="status" /></a>
                </tr>
			  <?php 
			  $query="select status from switch where s_id=2";
			  $res=mysql_query($query);
			  $row=mysql_fetch_array($res);
			  $status=$row['status'];
			  ?>
                <tr>
                  <td>交大西校区“校园物流”</td>
                  <td class="status_1"><?php if($status==0) echo "开"; if($status==1) echo "关";?></td>
                  <td>
                  	<a href="#" title="开" id="west_on"><i class="icon-ok"></i>开<input type="hidden" value="2" class="s_id" /><input type="hidden" value="0" class="status" /></a>
                  	<a href="#" title="关" id="west_off"><i class="icon-remove"></i>关<input type="hidden" value="2" class="s_id" /><input type="hidden" value="1" class="status" /></a>
                </tr>
              </tbody>
            </table>
         </div>
    </div>
</div>
<?php include 'include/footer.php' ?>
<script>
$('#east_on,#east_off,#west_on,#west_off').click(function(){
		var status_1=$(this).parent().parent().find('.status_1');
   		var s_id=$(this).find('.s_id').val();
		var status=$(this).find('.status').val();
   		$.ajax({
       		url:"update_switch_ajax.php",
	   		type:"POST",
	   		data:{s_id:s_id,status:status},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(status==0){
		       		alert('开启成功');
					status_1.text('开');
		   		}else{
		       		alert('关闭成功');
					status_1.text('关');
		   		}
	   		}
   		})
	
	})
</script>
