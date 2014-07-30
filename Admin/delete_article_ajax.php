<?php
include_once('../conn.php');
$article_id=$_POST['article_id'];
$delete="delete from article where article_id=$article_id";
if(mysql_query($delete)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>