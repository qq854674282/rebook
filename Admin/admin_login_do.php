<?php
ob_start();
session_start();
include_once('../conn.php');
$admin_name=$_POST['admin_name'];
$password=$_POST['password'];
$admin_type=$_POST['admin_type'];
$time=time();
$query="select 1 from admin where admin_name='$admin_name' and admin_type=$admin_type";
$res=mysql_query($query);
$num=mysql_num_rows($res);
if($num==0){
   echo "<script>alert('用户不存在，请返回重新登陆');location.href='sign_in.php';</script>";
   return;
}
$query="select password,admin_id from admin where admin_name='$admin_name'";
$res=mysql_query($query);
$row=mysql_fetch_array($res);
$admin_id=$row['admin_id'];
if($password==$row['password']){
   setcookie('admin_id',$admin_id);
   setcookie('admin_type',$admin_type);
   $update="update admin set login_time=$time where admin_id=$admin_id";
   mysql_query($update);
   echo "<script>location.href='index.php';</script>";
}else{
   echo "<script>alert('密码错误，请重新登录！');location.href='sign_in.php';</script>";
}
?>