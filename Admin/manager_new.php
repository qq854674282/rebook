<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
?> 
<div class="content">    
    <div class="header">
        <h1 class="page-title">添加管理员</h1>
    </div>  
    <ul class="breadcrumb">
    	<li>管理员</li><span class="divider">/</span>
    	<li class="active">添加管理员</li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
<div class="row-fluid">
    <div class="block span12">
        <a href="#ad-1" class="block-heading" data-toggle="collapse">添加管理员</a>
        <div id="ad-1" class="block-body collapse in">
        	<br>
            <form action="admin_do.php" method="post">
            	<label>用户名称：</label>
                <input type="text" name="admin_name">
                <label>密码：</label>
                <input type="text" name="password">
                <div class="clearfix"></div>
				<button class="btn" type="submit">确认添加</button>
            </form>      	
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>
