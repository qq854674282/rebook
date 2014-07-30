<?php
include_once('../conn.php');
$bottom_id=$_POST['bottom_id'];
$delete="delete from bottom where bottom_id=$bottom_id";
if(mysql_query($delete)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>