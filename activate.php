<?php
include_once('conn.php');
$email_md5=md5("email");
$email=$_GET["$email_md5"];
$update="update user set status=1 where md5(email)='$email'";
if(mysql_query($update)){
	echo "<script>alert('激活成功');location.href='sig_in.php';</script>";
}else{
    echo "<script>alert('激活失败！');location.href='sig_in.php';</script>";
}
?>