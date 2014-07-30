<?php
include_once('../conn.php');
$image_id=$_POST['image_id'];
$order_big=$_POST['order_big'];
$update="update big_picture set image_order=$order_big where image_id=$image_id";
if(mysql_query($update)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>