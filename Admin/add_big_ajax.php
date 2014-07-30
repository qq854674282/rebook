<?php
include_once('../conn.php');
$order_big=$_POST['order_big'];
$title_big=$_POST['title_big'];
$desc_big=$_POST['desc_big'];
$link_big=$_POST['link_big'];
$pic_big=$_POST['pic_big'];
$add_time=time();
$insert="insert into big_picture(image_title,image_desc,image_order,image_url,image_link,add_time) values('$title_big','$desc_big',$order_big,'$pic_big','$link_big',$add_time)";
if(mysql_query($insert)){
	$image_id=mysql_insert_id();
    $res['result']='success';
	$res['image_id']=$image_id;
}
else{
    $res['result']='fail';	
}
echo json_encode($res);
?>