<?php 
include_once('function.php');
$article_id=$_GET['article_id'];
$query="select * from article where article_id=$article_id";
$res=mysql_query($query);
$row=mysql_fetch_array($res);
$title=$row['article_title'];
include_once('include/header.php');
?>
<style>
.page_title {
	margin-bottom:30px;
	margin-top:0;
}
.page_content {
	text-align:center;
	text-indent:2em;
	margin-bottom:40px;
}
.page_content img {
	max-width:100%;
	margin-left:auto;
	margin-right:auto;
	text-align:center;
	margin:10px 0;
}
.page_content p {
	text-align:left;
	font-size:14px;
	line-height:30px;
	margin-bottom:0px;
}
</style>
<br>
<div class="clearfix"></div>
<div class="container">
    <div class="main_content">
    	<div class="page">
        	<h2 class="page_title"><?php echo $row['article_title'];?></h2>
            <div class="page_content">
            	<?php echo $row['article_content'];?>
            </div>
        </div>
    </div>

    <div class="slide_content">
    	<?php include_once('include/activity_list.php');?>
        <?php include_once('include/recommend_book_list.php');?>
    </div>
</div>
<script src="asset/index_none.js"></script>
<?php include 'include/footer.php' ?>

