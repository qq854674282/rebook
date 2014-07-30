<?php
include_once('../conn.php');
$bottom_id=$_POST['bottom_id'];
$bottom_order=$_POST['bottom_order'];
$update="update bottom set bottom_order=$bottom_order where bottom_id=$bottom_id";
if(mysql_query($update)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>