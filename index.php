<?php 
$user_id=1;
include_once('function.php');
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
            for ($j=1; $j<3; $j++){
               include 'include/book_line_define.php';
			}
        ?><!--首页图书展示，展示分类可管理员自定义-->
    </div>

    <div class="slide_content">
    	<div class="slide_a_d_box">
        	<h3>活动推广</h3>
            <a href="#"><img data-src="holder.js/298x129" alt=""></a>
            <a href="#"><img data-src="holder.js/298x129" alt=""></a>
            <a href="#"><img data-src="holder.js/298x129" alt=""></a>    
        </div>
        <?php include_once('include/recommend_book_list.php');?>
    </div>
</div>
<script src="asset/index.js"></script>
<?php include 'include/footer.php' ?>

