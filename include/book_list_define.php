<?php
$query="select * from info_column order by weight asc";
$res=mysql_query($query);
while($rows=mysql_fetch_array($res)){
	$major_id=$rows['major_id'];
	$class_id=$rows['class_id'];
	$num=$rows['num'];
	$column=$rows['column_name'];
	$column_id=$rows['column_id'];
?>
<div class="book_line">
    <div class="book_line_title">
        <a href="#" class="book_line_title_1 pull-left"><?php echo $column;?></a>
        <a href="more.php?column_id=<?php echo $column_id?>" class="book_line_title_2 pull-right">更多</a>
    </div>
    <div class="clearfix"></div>
    <?php	
		if($major_id!=0){
			$query1="select book_id from book where status=0 and major_id=$major_id order by book_id desc limit $num";
		}
		if($class_id!=0){
			$query1="select book_id from book where status=0 and class_id=$class_id order by book_id desc limit $num";
		}
		$res1=mysql_query($query1);
		while($rows1=mysql_fetch_array($res1)){
			$book=getBookBasicInfoById($rows1['book_id']);
			include('book_line_box.php');
		}
    ?>
    <div class="clearfix"></div>
</div>
<?php
}
?>