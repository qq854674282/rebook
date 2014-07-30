<?php
include_once('../conn.php');
$column_id=$_POST['column_id'];
$column_name=$_POST['column_name'];
$num=$_POST['num']*5;
$weight=$_POST['weight'];
$update="update info_column set column_name='$column_name',num=$num,weight=$weight where column_id=$column_id";
if(mysql_query($update)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>