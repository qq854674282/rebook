<?php
        include_once('../function.php');
		$admin_id=$_COOKIE['admin_id'];
		$oldpass=addslashes(trim($_POST['oldpass']));
		$newpass=addslashes(trim($_POST['newpass']));
		$newpass2=addslashes(trim($_POST['newpass2']));
		$query="select password from admin where admin_id=$admin_id";
		$res=mysql_query($query);
		$row=mysql_fetch_array($res);
		if($row['password']!=$oldpass){
		 	alertInfo('原始密码错误','reset_password.php');
		}else{
			if($newpass!=$newpass2){
				alertInfo('两次密码输入不一致','reset_password.php');
			}else{
				$update="update admin set password='$newpass' where admin_id=$admin_id";
				mysql_query($update);
				alertInfo('修改成功，请重新登录','sign_in.php');
			}
		}

?>