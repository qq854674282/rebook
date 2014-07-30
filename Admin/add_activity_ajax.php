<?php
include_once('../conn.php');
$activity_order=$_POST['activity_order'];
$activity_title=$_POST['activity_title'];
$activity_link=$_POST['activity_link'];
$activity_pic=$_POST['activity_pic'];
$add_time=time();
$insert="insert into activity(activity_title,activity_url,activity_order,activity_image,add_time) values('$activity_title','$activity_link',$activity_order,'$activity_pic',$add_time)";
if(mysql_query($insert)){
	$image_id=mysql_insert_id();
    $res['result']='success';
	$res['image_id']=$image_id;
}
else{
    $res['result']='fail';	
	$res['insert']=$insert;
}
echo json_encode($res);
?>