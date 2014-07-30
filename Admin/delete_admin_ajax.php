<?php
include_once('../conn.php');
$admin_id=$_POST['admin_id'];
$delete="delete from admin where admin_id=$admin_id";
if(mysql_query($delete)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>