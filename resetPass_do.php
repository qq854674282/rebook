<?php
include_once('conn.php');
$email=$_POST["email"];
$pass=$_POST["pass"];
$update="update user set password=md5(".$pass.") where md5(email)='$email'";
if(mysql_query($update)){
	echo "<script>alert('密码重置成功，请重新登录');location.href='sig_in.php';</script>";
}else{
    echo "<script>alert('密码重置失败！');location.href='forget.php';</script>";
}
?>