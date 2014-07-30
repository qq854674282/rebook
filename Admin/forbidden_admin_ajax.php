<?php
include_once('../conn.php');
$admin_id=$_POST['admin_id'];
$status=$_POST['status'];
$update="update admin set status=$status where admin_id=$admin_id";
if(mysql_query($update)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>