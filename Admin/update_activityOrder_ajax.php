<?php
include_once('../conn.php');
$activity_id=$_POST['activity_id'];
$activity_order=$_POST['activity_order'];
$update="update activity set activity_order=$activity_order where activity_id=$activity_id";
if(mysql_query($update)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>