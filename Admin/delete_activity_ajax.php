<?php
include_once('../conn.php');
$activity_id=$_POST['activity_id'];
$delete="delete from activity where activity_id=$activity_id";
if(mysql_query($delete)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>