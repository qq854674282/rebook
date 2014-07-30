<?php
include_once('../conn.php');
$image_id=$_POST['image_id'];
$delete="delete from big_picture where image_id=$image_id";
if(mysql_query($delete)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>