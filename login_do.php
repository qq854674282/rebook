<?php
ob_start();
session_start();
include_once('conn.php');
$email=$_POST['email'];
$password=$_POST['password'];
$query="select 1 from user where email='$email'";
$res=mysql_query($query);
$num=mysql_num_rows($res);
if($num==0){
   echo "<script>alert('用户不存在，请返回重新登陆');location.href='sig_in.php';</script>";
   return;
}
$query="select password,status,user_id from user where email='$email'";
$res=mysql_query($query);
$row=mysql_fetch_array($res);
$status=$row['status'];
if($status==0){
   echo "<script>alert('您尚未激活此账号，请登录您的校内邮箱进行激活，激活后重新登录！');location.href='sig_in.php';</script>";
   return;
}
if(md5($password)==$row['password']){
   setcookie('user_id',$row['user_id']);
   echo "<script>location.href='index.php';</script>";
}else{
   echo "<script>alert('密码错误，请重新登录！');location.href='sig_in.php';</script>";
}
?>