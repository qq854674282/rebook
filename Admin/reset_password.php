<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
?>  
<div class="content">
    
    <div class="header">
        <h1 class="page-title">修改密码</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li class="active">修改密码</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
<div class="row-fluid">
    <div class="block span12">
        <a href="#abd-1" class="block-heading" data-toggle="collapse">修改密码</a>
        <div id="abd-1" class="block-body collapse in">
        <br>
			<form action="password_do.php" method="post">
            	<label>原密码</label>
            	<input type="password" placeholder="" name="oldpass">
            	<label>新密码</label>
            	<input type="password" placeholder="" name="newpass">
            	<label>确认新密码</label>
            	<input type="password" placeholder="" name="newpass2">
				<div class="clearfix"></div>
                <button class="btn" type="submit">确认修改</button>                
            </form>
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>
