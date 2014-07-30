<?php
include_once('conn.php');
$buyer_id=$_POST['buyer_id'];
$seller_id=$_POST['seller_id'];
$book_id=$_POST['book_id'];
$query="select 1 from book where book_id=$book_id and status=0";
$result=mysql_query($query);
$num=mysql_num_rows($result);
if($num==0){
    $res['result']='sold';
	echo json_encode($res);
	return;
}
$time=time();
$insert="insert into temporary_order(buyer_id,seller_id,book_id,add_time) values($buyer_id,$seller_id,$book_id,$time)";
if(mysql_query($insert)){
	$query="select wanted from book where book_id=$book_id";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$wanted=$row['wanted']+1;
    $update="update book set wanted=$wanted where book_id=$book_id";
	mysql_query($update);
    $res['result']='success';
	echo json_encode($res);
}
else{
    $res['result']='fail';
	echo json_encode($res);
}
?>