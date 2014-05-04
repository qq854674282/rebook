<div class="slide_book_list">
		<h3>图书推荐</h3>
            <ul>            
				<?php
				    $limit=7;
					$newBooks=getRecommendBooks($limit);
    				for ($i=0; $i<$limit; $i++){
	  					$book_id=$newBooks[$i]['book_id'];
						$user_id=$newBooks[$i]['user_id'];
						$book_price=$newBooks[$i]['book_price'];
						$add_time=$newBooks[$i]['add_time'];
						$book_image=$newBooks[$i]['book_image'];
						$user_name=getUsernameById($user_id);
	  					if($newBooks[$i]['zone']==1) $zone="东校区";
	  					else $zone="西校区";
	 					if($newBooks[$i]['send_type']==1) $send_type="自己联系";
	  					else $send_type="校园物流";
	  					$time=calculateTime($add_time);
				?>
				<li><a href="book.php?book_id=<?php echo $book_id;?>" class="book_list_box">
    				<img src="<?php echo $book_image;?>" class="pull-left" alt="">
    				<div class="pull-left slide_book_list_content">
       				<p class="slide_book_list_content_name"><?php echo $user_name;?><span class="slide_book_list_content_time"><?php echo $time;?>发布</span></p>
       				<p><?php echo $zone;?>--<?php echo $send_type;?></p>
        			<p class="slide_book_list_content_price">￥<?php echo $book_price;?></p>
   				    </div>
				</a></li>
				<?php
					}
    			?>
            </ul>
	</div>