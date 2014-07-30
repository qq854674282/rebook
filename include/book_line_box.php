<div class="book_line_box">
    <a href="book.php?book_id=<?php echo $book['book_id'];?>"><img src="<?php echo $book['book_image'];?>" alt=""></a>
    <p class="book_line_box_name"><?php echo $book['book_name'];?></p>
    <p class="book_line_box_region"><?php echo $book['zone'];?>--<?php echo $book['send_type'];?></p>
    <p class="book_line_box_price">￥<?php echo $book['book_price'];?><span class="book_line_box_time"><?php echo calculateTime($book['add_time']);?>发布</span></p>
</div>
