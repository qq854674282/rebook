<?php
include_once('../conn.php');
$column_id=$_POST['column_id'];
$delete="delete from info_column where column_id=$column_id";
if(mysql_query($delete)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>