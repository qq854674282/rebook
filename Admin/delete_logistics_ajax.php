<?php
include_once('../conn.php');
$order_id=$_POST['order_id'];
$delete="delete from logistics where order_id=$order_id";
if(mysql_query($delete)){
	$delete="delete from book_order where order_id=$order_id";
	mysql_query($delete);
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>