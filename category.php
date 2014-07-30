<?php
include_once('function.php');
$title="睿书网";
include_once('include/header.php');
$academy_id=0;
$major_id=0;
$class_id=0;
$grade=0;
$grade_array=array('大一','大二','大三','大四');
if(isset($_GET['academy_id'])){
    $academy_id=$_GET['academy_id'];
}
if(isset($_GET['major_id'])){
    $major_id=$_GET['major_id'];
}
if(isset($_GET['class_id'])){
    $class_id=$_GET['class_id'];
}
if(isset($_GET['grade'])){
    $grade=$_GET['grade'];
}
$navi_title="";
if($academy_id!=0){
   $navi_title=getNameById("academy",$academy_id);
}
if($major_id!=0){
   $navi_title=getNameById("major",$major_id);
}
if($class_id!=0){
   $navi_title=getNameById("class",$class_id);
}
if($major_id!=0){
   $navi_title=getNameById("major",$major_id);
}
if($grade!=0){
   $navi_title.="--".$grade_array[$grade-1];
}
?>
<br><br>
<div class="clearfix"></div>
<div class="container">
    <div class="main_content">
        <div class="book_line">
            <div class="book_line_title">
                <a href="#" class="book_line_title_1 pull-left"><?php echo $navi_title;?></a><!--搜索关键词或分类关键词-->
            </div>
            <div class="clearfix"></div>	
            <?php
					//分页
					$pagesize = 20;
					$sql_page = "select 1 from book where status=0 and grade=$grade ";
					if($academy_id!=0){
						$sql_page.="and academy_id=$academy_id ";
					}
					if($major_id!=0){
						$sql_page.="and major_id=$major_id ";
					}
					if($class_id!=0){
						$sql_page.="and class_id=$class_id ";
					}
					$rs_page = mysql_query($sql_page);
					$count = mysql_num_rows($rs_page);
					if($count%$pagesize){
						$pagecount = intval($count/$pagesize)+1;
					}else{
						$pagecount = intval($count/$pagesize);
					}
					if(isset($_GET['page'])){
						$page=intval($_GET['page']);
					}else{
						$page=1;
					}
					$pagestart = ($page-1)*$pagesize;
					$sql = "select book_id,book_name,book_price,zone,send_type,book_image,add_time from book where status=0 and grade=$grade ";
					if($academy_id!=0){
						$sql.="and academy_id=$academy_id ";
					}
					if($major_id!=0){
						$sql.="and major_id=$major_id ";
					}
					if($class_id!=0){
						$sql.="and class_id=$class_id ";
					}
					$sql.="order by add_time desc limit ".$pagestart.",".$pagesize;
					$rs = mysql_query($sql);
					while($rows = mysql_fetch_array($rs)){
	  					$time=calculateTime($rows['add_time']);
			?>
			<div class="book_line_box">
    			<a href="book.php?book_id=<?php echo $rows['book_id'];?>"><img src="<?php echo $rows['book_image'];?>" alt=""></a>
    			<p class="book_line_box_name"><?php echo $rows['book_name'];?></p>
    			<p class="book_line_box_region"><?php echo $rows['zone'];?>--<?php echo $rows['send_type'];?></p><!--东校区--校园物流-->
    			<p class="book_line_box_price">￥<?php echo $rows['book_price'];?><span class="book_line_box_time"><?php echo $time;?>发布</span></p>
			</div>	
            <?php
            		}
            ?>
            <div class="clearfix"></div>
        </div>
        <?php	
					if($count==0){
						  echo "<center><b>没有相关书籍！</b></center>";
					}else if($count>20){
					      echo showPage('search_book.php',$page,$pagecount);
					}else{
					      echo "";
					}
		?>  
    </div>
    <div class="slide_content">
        <?php 
		 	include_once('include/recommend_book_list.php');
			include_once('include/latest_book_list.php');
		?>
    </div>
</div>
<script src="asset/index_none.js"></script>
<?php include 'include/footer.php' ?>
