<?php
include_once('function.php');
if(!isset($_POST['user_id'])){
	alertInfo('禁止访问！','registe.php');
	return;
}
$user_id=$_POST['user_id'];
$email=addslashes(trim($_POST['email']));
$update="update user set email='$email' where user_id=$user_id";
if(mysql_query($update)){
	include_once('mail.php');
	alertInfo('激活邮件已发送至新邮箱，请注意查收！','index.php');
}
else{
	alertInfo('注册失败！','registe.php');
}
?>