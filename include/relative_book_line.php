<?php
    $query="select book_id from book where ";
	if($major_id!=0){
		$query.="major_id=$major_id ";
	}else{
		if($academy_id!=0){
			$query.="academy_id=$academy_id ";
		}
	}
	$query.="order by book_id desc limit 5";
	$res=mysql_query($query);
	while($rows=mysql_fetch_array($res)){
		if($book_id==$rows['book_id']){
			continue;
		}
		$book=getBookBasicInfoById($rows['book_id']);
		include('include/book_line_box.php');
	}
?>