<div class="slide_book_list">
		<h3>图书推荐</h3>
            <ul>            
				<?php
				    $limit=10;
					$recommendBooks=getRecommendBooks($limit);
					if($limit>count($recommendBooks)){
					   $limit=count($recommendBooks);
					}
    				for ($i=0; $i<$limit; $i++){
	  					$book_id=$recommendBooks[$i]['book_id'];
						$book_name=$recommendBooks[$i]['book_name'];
						$user_id=$recommendBooks[$i]['user_id'];
						$book_price=$recommendBooks[$i]['book_price'];
						$add_time=$recommendBooks[$i]['add_time'];
						$book_image=$recommendBooks[$i]['book_image'];
						$zone=$recommendBooks[$i]['zone'];
						$send_type=$recommendBooks[$i]['send_type'];
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