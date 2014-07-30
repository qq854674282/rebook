<?php
   $pub_user_id=$book['user_id'];
   $query="select book_name,book_id,author from book where status=0 and user_id=$pub_user_id order by book_id desc limit 5";
   $res=mysql_query($query);
   while($rows=mysql_fetch_array($res)){
		if($book_id==$rows['book_id']){
			continue;
		}
		$book=getBookBasicInfoById($rows['book_id']);
		include('include/book_line_box.php');
	}
?>