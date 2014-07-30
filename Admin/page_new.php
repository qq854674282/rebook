<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
?>  
<script type="text/javascript" charset="utf-8" src="../asset/lib/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../asset/lib/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../asset/lib/ueditor/lang/zh-cn/zh-cn.js"></script>  
<div class="content">
    <div class="header">
        <h1 class="page-title">静态页面</h1>
    </div>   
    <ul class="breadcrumb">
    	<li>静态页面</li><span class="divider">/</span>
    	<li class="active">添加静态页面</li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
<div class="row-fluid">
    <div class="block span12">
        <a href="#ad-1" class="block-heading" data-toggle="collapse">添加静态页面	</a>
        <div id="ad-1" class="block-body collapse in">
        	<br>
        	<form action="add_page_do.php" method="post">
            	<label>标题：</label>
                <input type="text" name="title">
                <label>备注：</label>
                <input type="text" name="remark">
                <label>页面内容：</label>
            	<script id="editor" type="text/plain" style="width:90%;height:600px;" name="content"></script>
                <br>
                <button class="btn" type="submit">添加</button>
            </form>       	
        </div>
    </div>
</div>

<script>
UE.getEditor('editor');
</script>
<?php include 'include/footer.php' ?>
