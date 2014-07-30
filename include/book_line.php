<div class="book_line">
    <div class="book_line_title">
        <a href="#" class="book_line_title_1 pull-left">最新发布</a>
        <a href="more_latest.php" class="book_line_title_2 pull-right">更多</a>
    </div>
    <div class="clearfix"></div>
    <?php
	$newBooks=getNewBooks(5);
    for ($i=0; $i<5; $i++){
	  $book_id=$newBooks[$i]['book_id'];
	  $add_time=$newBooks[$i]['add_time'];
	  $time=calculateTime($add_time);
	?>
	<div class="book_line_box">
    	<a href="book.php?book_id=<?php echo $book_id;?>"><img src="<?php echo $newBooks[$i]['book_image'];?>" alt=""></a>
    	<p class="book_line_box_name"><?php echo $newBooks[$i]['book_name'];?></p>
    	<p class="book_line_box_region"><?php echo $newBooks[$i]['zone'];?>--<?php echo $newBooks[$i]['send_type'];?></p><!--东校区--校园物流-->
    	<p class="book_line_box_price">￥<?php echo $newBooks[$i]['book_price'];?><span class="book_line_box_time"><?php echo $time;?>发布</span></p>
    </div>
	<?php
	}
    ?>
    <div class="clearfix"></div>
</div>
