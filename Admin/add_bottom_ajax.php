<?php
include_once('../conn.php');
$bottom_order=$_POST['bottom_order'];
$bottom_link=$_POST['bottom_link'];
$bottom_pic=$_POST['bottom_pic'];
$add_time=time();
$insert="insert into bottom(bottom_link,bottom_order,bottom_image,add_time) values('$bottom_link',$bottom_order,'$bottom_pic',$add_time)";
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