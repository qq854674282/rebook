<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner">
  <?php
      include_once('conn.php');
	  $query="select image_url,image_title,image_desc from big_picture order by image_order asc";
	  $res=mysql_query($query);
	  $i=0;
	  while($rows=mysql_fetch_array($res)){
  ?>
    <div class="item <?php if($i==1)echo "active";?>">
      <img src="<?php echo $rows['image_url'];?>" alt="">
      <div class="carousel-caption">
        <h4><?php echo $rows['image_title'];?></h4>
        <p><?php echo $rows['image_desc'];?></p>
      </div>
    </div>
	<?php
	   $i++;
	}
	?>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div>
