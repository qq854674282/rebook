<?php
include_once('conn.php');
$book_id=$_POST['book_id'];
$user_id=$_POST['user_id'];
$query="select sell_num from user where user_id=$user_id";
$rs=mysql_query($query);
$row=mysql_fetch_array($rs);
$sell_num=$row['sell_num'];
if($sell_num>=5){
	$res['result']='full';
}else{
	$update="update book set status=0 where book_id=$book_id";
	if(mysql_query($update)){
		$delete="delete from temporary_order where book_id=$book_id";
		mysql_query($delete);
		$update="update user set sell_num=sell_num+1 where user_id=$user_id";
		mysql_query($update);
    	$res['result']='success';
	}else{
    	$res['result']='fail';	
	}
}
echo json_encode($res);
?>