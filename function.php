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
//根据学院名、专业id等查询对应的name
function getNameById($table_name,$id){
    $id_name=$table_name."_id";
	$name_name=$table_name."_name";	
    $query="select $name_name from $table_name where $id_name='$id'";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	$name=$row["$name_name"];
	return $name;
}
//根据书的id查书的详细信息
function getBookDetailById($book_id){	
    $query="select book_name,author,publisher,version,book_price,zone,send_type,add_time,book_image,book_desc,user_id,wanted,academy_id,major_id from book where book_id=$book_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row;
}
//根据书的id查询封面图片
function getBookImageById($book_id){
    $query="select book_image from book where book_id=$book_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row['book_image'];
}
//根据书的id查书的基本信息
function getBookNameById($book_id){	
    $query="select book_name from book where book_id=$book_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row['book_name'];
}
//根据书的id查书的基本信息
function getBookBasicInfoById($book_id){	
    $query="select book_id,book_name,book_price,zone,send_type,add_time,book_image from book where book_id=$book_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row;
}
//根据数量限制查询新书基本信息
function getNewBooks($limit){
    $query="select 1 from book where status=0";
	$res=mysql_query($query);
	$num=mysql_num_rows($res);
	if($num<$limit){
	    $limit=$num;
	}
    $query="select book_id,user_id,book_name,book_price,zone,send_type,add_time,book_image from book where status=0 order by add_time desc limit $limit";
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
    $query="select 1 from book where sale=1 and status=0";
	$res=mysql_query($query);
	$num=mysql_num_rows($res);
	if($num<$limit){
	    $limit=$num;
	}	
    $query="select book_id,user_id,book_name,book_price,zone,send_type,add_time,book_image from book where sale=1 and status=0 order by add_time desc limit $limit";
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
function getUserNameById($user_id){
    $query="select user_name from user where user_id=$user_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	if($row['user_name']==""){
		$user_name="管理员";
	}else{
		$user_name=$row['user_name'];
	}
	return $user_name;
}
//根据用户id查询用户在售书数量
function getSellNumById($user_id){
    $query="select sell_num from user where user_id=$user_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row['sell_num'];
}
//根据用户id查询用户信息
function getUserInfoById($user_id){
    $query="select user_name,sell_num,buy_num,phone,address from user where user_id=$user_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row;
}
//根据用户id查询买家卖家信息
function getBuyerSellerInfoById($user_id){
    $query="select user_name,address from user where user_id=$user_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	return $row;
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
	     echo "<script>alert('您尚未登录，请先登录！');location.href='sig_in.php';</script>";
		 return;
	 }else{
	  	 $user_id=$_COOKIE['user_id'];
	 }   
}
//
function checkAdmin(){
     if(!isset($_COOKIE['admin_id'])){
	     echo "<script>alert('您尚未登录，请先登录！');location.href='sign_in.php';</script>";
		 return;
	 }else{
	  	 $user_id=$_COOKIE['user_id'];
	 }   
}
function checkSellnum($sell_num){
     if($sell_num>=5){
	     echo "<script>alert('在售书籍不能超过5本，请先下架已发布的书籍，再发布新书！');location.href='user_center.php#user_book';</script>";
		 return;
	 }
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
function alertInfo($info,$url){
		echo "<script language='javascript'>alert('".$info."');location.href='".$url."'</script>";
}
function getTodayBooksNum(){
    $today_start=strtotime(date('Y-m-d 00:00:00'));
	$query="select 1 from book where add_time>$today_start";
	$res=mysql_query($query);
	$num=mysql_num_rows($res);
	return $num;
}

function getTodayUsersNum(){
    $today_start=strtotime(date('Y-m-d 00:00:00'));
	$query="select 1 from user where register_time>$today_start";
	$res=mysql_query($query);
	$num=mysql_num_rows($res);
	return $num;
}
function getTodayOrdersNum(){
    $today_start=strtotime(date('Y-m-d 00:00:00'));
	$query="select 1 from book_order where add_time>$today_start";
	$res=mysql_query($query);
	$num=mysql_num_rows($res);
	return $num;
}
function getAllBooksNum(){
	$query="select 1 from book where status=0";
	$res=mysql_query($query);
	$num=mysql_num_rows($res);
	return $num;
}
function getClassById($book_id){
	$query="select major_id,academy_id from book where book_id=$book_id";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	$major_id=$row['major_id'];
	$academy_id=$row['academy_id'];
	$academy_name=getNameById('academy',$academy_id);
	$major_name=getNameById('major',$major_id);	
	return $academy_name."--".$major_name;
}

?>