<?php
include_once('conn.php');
//根据学院名、专业名称等查询对应的id
function getIdByName($table_name,$name){
    $id_name=$table_name."_id";
	$name_name=$table_name."_name";	
    $query="select $id_name from $table_name where $name_name='$name'";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	$id=$row["$id_name"];
	return $id;
}
//根据书的id查书的详细信息
function getBookDetailById($book_id){	
    $query="select book_name,author,publisher,version,book_price,zone,send_type,add_time,book_image from book where book_id=$book_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row;
}
//根据书的id查书的基本信息
function getBookBasicInfoById($book_id){	
    $query="select book_name,book_price,zone,send_type,add_time from book where book_id=$book_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row;
}
//根据数量限制查询新书基本信息
function getNewBooks($limit){
    $query="select 1 from book";
	$res=mysql_query($query);
	$num=mysql_num_rows($res);
	if($num<$limit){
	    $limit=$num;
	}
    $query="select book_id,user_id,book_name,book_price,zone,send_type,add_time,book_image from book order by add_time desc limit $limit";
	$res=mysql_query($query);
	$rows=array();
	$i=0;
	while($row=mysql_fetch_array($res)){
	    $rows[$i]['book_id']=$row['book_id'];
		$rows[$i]['user_id']=$row['user_id'];
		$rows[$i]['book_name']=$row['book_name'];
		$rows[$i]['book_price']=$row['book_price'];
		$rows[$i]['zone']=$row['zone'];
		$rows[$i]['send_type']=$row['send_type'];
		$rows[$i]['add_time']=$row['add_time'];
		$rows[$i]['book_image']=$row['book_image'];
		$i++;
	}
	return $rows;
}
//根据数量限制查询推荐书籍基本信息
function getRecommendBooks($limit){
    $query="select 1 from book where recommend=1";
	$res=mysql_query($query);
	$num=mysql_num_rows($res);
	if($num<$limit){
	    $limit=$num;
	}	
    $query="select book_id,user_id,book_name,book_price,zone,send_type,add_time,book_image from book where recommend=1 order by add_time desc limit $limit";
	$res=mysql_query($query);
	$rows=array();
	$i=0;
	while($row=mysql_fetch_array($res)){
	    $rows[$i]['book_id']=$row['book_id'];
		$rows[$i]['user_id']=$row['user_id'];
		$rows[$i]['book_name']=$row['book_name'];
		$rows[$i]['book_price']=$row['book_price'];
		$rows[$i]['zone']=$row['zone'];
		$rows[$i]['send_type']=$row['send_type'];
		$rows[$i]['add_time']=$row['add_time'];
		$rows[$i]['book_image']=$row['book_image'];
		$i++;
	}
	return $rows;
}
//根据用户id查询用户名
function getUsernameById($user_id){
    $query="select user_name from user where user_id=$user_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row['user_name'];
}
//根据图书发布时间算time
function calculateTime($add_time){
    $time=time()-$add_time;
	$time=(int)($time/3600);
	if($time==0){
	    return "刚刚";
	}
	elseif($time>0&&$time<24){
	    return $time."小时前";
	}else{
	    return (int)($time/24)."天前";
	}
}
//验证登录与否
function checkUser(){
     if(!isset($_COOKIE['user_id'])){
	     echo "<script>alert('您尚未登录，请先登录！');location.href='login.php';</script>";
	 }    
}
//根据用户id查询出售书的数量
function getSellNumByUserId($user_id){
    $query="select sell_num from user where user_id=$user_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row['sell_num'];
}
function showPage($url,$page,$pagecount){
	$tempStr="";
	$spacer="?";
	if(strpos($url,"?")>-1) $spacer='&';
	$url.=$spacer;
	$tempStr="<div class='pagination'><ul><li><a href='".$url."page=1'>首页</a></li>";
	if($page>1)
		$tempStr.="<li><a href='".$url."page=".($page-1)."'>上一页</a><li>";
	else  
		$tempStr.="<li><a href='#'>上一页</a></li>";
	if($page<$pagecount)
		$tempStr.="<li><a href='".$url."page=".($page+1)."'>下一页</a></li>";
	else
		$tempStr.="<li><a href='#' class='have_bg'>下一页</a></li>";
	$tempStr.="<li><a href='".$url."page=".$pagecount."'>尾页</a></li></ul></div>";
	return $tempStr;
}
?>