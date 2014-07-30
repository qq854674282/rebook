<div class="slide_a_d_box">
        	<h3>活动推广</h3>
			<?php
				$query="select * from activity order by activity_order limit 3";
				$res=mysql_query($query);
				while($rows=mysql_fetch_array($res)){
			?>
            <a href="<?php echo $rows['activity_url'];?>"><img src="<?php echo "admin/files/".$rows['activity_image'];?>" alt=""></a>
			<?php
			}
			?>  
</div>