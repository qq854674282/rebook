<?php
include_once('../conn.php');
$order_id=$_POST['order_id'];
$status=$_POST['status'];
$time=time();
$insert="insert into logistics(order_id,status,time) values($order_id,$status,$time)";
if(mysql_query($insert)){
	$update="update book_order set logistics_status=$status where order_id=$order_id";
	mysql_query($update);
	if($status==4){
    	$update="update book_order set status=1,done_time=$time where order_id=$order_id";
		mysql_query($update);
	}
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>