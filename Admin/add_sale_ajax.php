<?php
include_once('../conn.php');
$book_id=$_POST['book_id'];
$update="update book set sale=1 where book_id=$book_id";
if(mysql_query($update)){
    $res['result']='success';
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>