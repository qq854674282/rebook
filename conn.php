<?php
$conn=mysql_connect('localhost','root','');
if (!$conn){
		die ('数据库连接失败');
	}
mysql_select_db('oldbook', $conn) or die ("没有找到数据库。");
mysql_query("set names utf8");
?>