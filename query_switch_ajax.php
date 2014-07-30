<?php
include_once('conn.php');
$s_id=$_POST['s_id'];
$status=$_POST['status'];
$query="select status from switch where s_id=$s_id";
$res=mysql_query($query);
$row=mysql_fetch_array($res);
echo json_encode($row);
?>