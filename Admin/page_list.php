<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
?>  
<div class="content">   
    <div class="header">
        <h1 class="page-title">静态页面</h1>
    </div>  
    <ul class="breadcrumb">
    	<li>静态页面</li><span class="divider">/</span>
    	<li class="active">管理静态页面</li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
<div class="row-fluid">
    <div class="block span12">
        <a href="#ad-1" class="block-heading" data-toggle="collapse">管理静态页面	</a>
        <div id="ad-1" class="block-body collapse in">
			<table class="table">
              <thead>
                <tr>
                  <th>添加时间</th>
                  <th>标题</th>
                  <th>备注</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  	$query="select article_id,article_title,add_time,remark from article order by article_id desc";
				$res=mysql_query($query);
				while($rows=mysql_fetch_array($res)){
			  ?>
                <tr>
                  <td><?php echo date('Y-m-d H:i',$rows['add_time']);?></td>
                  <td><a href="../page.php?article_id=<?php echo $rows['article_id'];?>" target="_blank"><?php echo $rows['article_title'];?></a></td>
                  <td><?php echo $rows['remark'];?></td>
                  <td>
				  	<input type="hidden" class="article_id" value="<?php echo $rows['article_id'];?>" />
                  	<a href="#" title="删除" class="delete"><i class="icon-remove"></i>删除</a>
					<a href="page_edit.php?article_id=<?php echo $rows['article_id'];?>" title="编辑" class="edit"><i class="icon-edit"></i>编辑</a>
				  </td>
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
   		var article_id=$(this).parent().find('.article_id').val();
   		$.ajax({
       		url:"delete_article_ajax.php",
	   		type:"POST",
	   		data:{article_id:article_id},
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