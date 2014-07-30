<div class="slide_book_list">
            <h3>最新发布</h3>
            <ul>            
				<?php
				    $limit=10;
					$newBooks=getNewBooks($limit);
					if($limit>count($newBooks)){
					   $limit=count($newBooks);
					}
    				for ($i=0; $i<$limit; $i++){
	  					$book_id=$newBooks[$i]['book_id'];
						$book_name=$newBooks[$i]['book_name'];
						$user_id=$newBooks[$i]['user_id'];
						$book_price=$newBooks[$i]['book_price'];
						$add_time=$newBooks[$i]['add_time'];
						$book_image=$newBooks[$i]['book_image'];
						$send_type=$newBooks[$i]['send_type'];
						$zone=$newBooks[$i]['zone'];
						$user_name=getUsernameById($user_id);
	  					$time=calculateTime($add_time);
				?>
				<li><a href="book.php?book_id=<?php echo $book_id;?>" class="book_list_box">
    				<img src="<?php echo $book_image;?>" class="pull-left" alt="">
    				<div class="pull-left slide_book_list_content">
       				<p class="slide_book_list_content_name"><?php echo $book_name;?><!--span class="slide_book_list_content_time"><?php echo $time;?>发布</span--></p>
       				<p><?php echo $zone;?>--<?php echo $send_type;?></p>
        			<p class="slide_book_list_content_price">￥<?php echo $book_price;?></p>
   				    </div>
				</a></li>
				<?php
					}
    			?>
            </ul>
</div>