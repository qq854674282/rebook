<?php
include_once('function.php');
$op=$_GET['op'];
$user_id=$_POST['user_id'];
switch($op)
{
	case 'edit':
		$link_name=addslashes(trim($_POST['user_name']));
		$phone=addslashes(trim($_POST['phone']));
		$address=addslashes(trim($_POST['address']));
		$update="update user set user_name='$user_name',phone='$phone',address='$address' where user_id=$user_id";
		if(mysql_query($update)){
		    alertInfo('更新用户信息成功！','user_center.php#user_info');
		}else{
		    alertInfo('更新用户信息失败！','user_center.php#user_info');
		}
		break;
	case 'updatePass':
		$oldpass=addslashes(trim($_POST['oldpass']));
		$newpass=addslashes(trim($_POST['newpass']));
		$newpass2=addslashes(trim($_POST['newpass2']));
		$query="select password from user where user_id=$user_id";
		$res=mysql_query($query);
		$row=mysql_fetch_array($res);
		if($row['password']!=md5($oldpass)){
		 	alertInfo('原始密码错误','user_center.php#user_password');
		}else{
			if($newpass!=$newpass2){
				alertInfo('两次密码输入不一致','user_center.php#user_password');
			}else{
			    $newpass=md5($newpass);
				$update="update user set password='$newpass' where user_id=$user_id";
				mysql_query($update);
				alertInfo('修改成功，请重新登录','sig_in.php');
			}
		}
		break;
}
?>