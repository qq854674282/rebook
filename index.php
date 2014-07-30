<?php
include_once('function.php');
$title="睿书网";
include_once('include/header.php');
?>
<div class="container">
	<?php include 'include/gallery.php' ?>
</div>
<div class="clearfix"></div>
<div class="container">
    <div class="main_content">
	    <?php
		    
            include 'include/book_line.php';    
            include 'include/book_list_define.php';
        ?><!--首页图书展示，展示分类可管理员自定义-->
    </div>

    <div class="slide_content">
        <?php include_once('include/activity_list.php');?>
        <?php include_once('include/recommend_book_list.php');?>
    </div>
</div>
<script src="asset/index.js"></script>
<?php include 'include/footer.php' ?>

