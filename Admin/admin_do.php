<?php
include_once('../conn.php');
$admin_name=addslashes(trim($_POST['admin_name']));
$password=addslashes(trim($_POST['password']));
$add_time=time();
$insert="insert into admin(admin_name,password,add_time) values('$admin_name','$password',$add_time)";
if(mysql_query($insert)){
	echo "<script>location.href='manager_list.php'</script>";
}else{
	echo "<script>alert('Ìí¼ÓÊ§°Ü');location.href='manager_list.php'</script>";
}

?>