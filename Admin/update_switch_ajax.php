<?php
include_once('../conn.php');
$s_id=$_POST['s_id'];
$status=$_POST['status'];
$update="update switch set status=$status where s_id=$s_id";
if(mysql_query($update)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>