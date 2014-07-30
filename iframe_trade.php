<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style>
a {
	color:#666;
}
.trade_info:hover {
	background-color:#ffe2cf;
}
.trade_info {
	padding:10px;
}
.trade_info img {
	float:left;
	width:100px;
	height:140px;
}
.trade_info ul {
	float:left;
	color:#666;
	margin:0;
	height:140px;
	overflow:scroll;
	overflow-x:hidden;
	font-size:14px;
	width:500px;
}
.trade_info {
	clear:both;
	float:left;
	margin-bottom:-10px;
}
.pagination {
	clear:both;
}
.pagination {
    margin: 20px 0;
}
.pagination ul {
    border-radius: 4px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    display: inline-block;
    margin-bottom: 0;
    margin-left: 0;
}
.pagination ul > li {
    display: inline;
}
.pagination ul > li > a, .pagination ul > li > span {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #FFFFFF;
    border-color: #DDDDDD;
    border-image: none;
    border-style: solid;
    border-width: 1px 1px 1px 0;
    float: left;
    line-height: 20px;
    padding: 4px 12px;
    text-decoration: none;
}
.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span {
    background-color: #F5F5F5;
}
.pagination ul > .active > a, .pagination ul > .active > span {
    color: #999999;
    cursor: default;
}
.pagination ul > .disabled > span, .pagination ul > .disabled > a, .pagination ul > .disabled > a:hover, .pagination ul > .disabled > a:focus {
    background-color: rgba(0, 0, 0, 0);
    color: #999999;
    cursor: default;
}
.pagination ul > li:first-child > a, .pagination ul > li:first-child > span {
    border-bottom-left-radius: 4px;
    border-left-width: 1px;
    border-top-left-radius: 4px;
}
.pagination ul > li:last-child > a, .pagination ul > li:last-child > span {
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
}
</style>
</head>

<body>
<?php
			  //分页
			  include_once('function.php');
			  $user_id=$_COOKIE['user_id'];
			  $pagesize = 5;
			  $sql_page = "select 1 from book_order where status=0 and buyer_id=$user_id";
			  $rs_page = mysql_query($sql_page);
			  $count = mysql_num_rows($rs_page);
			  if($count%$pagesize){
				 $pagecount = intval($count/$pagesize)+1;
			  }else{
				 $pagecount = intval($count/$pagesize);
			  }
			  if(isset($_GET['page'])){
				 $page=intval($_GET['page']);
			  }else{
				 $page=1;
			  }
			  $pagestart = ($page-1)*$pagesize;
			  $query="select order_id,book_id,add_time from book_order where status=0 and buyer_id=$user_id order by order_id asc limit ".$pagestart.",".$pagesize;
			  $res=mysql_query($query);
			  while($rows=mysql_fetch_array($res)){
			  	$book_id=$rows['book_id'];
				$order_id=$rows['order_id'];
				$book_image=getBookImageById($book_id);
				$add_time=$rows['add_time'];
?>
<div class="trade_info">
    <img src="<?php echo $book_image; ?>">
    <ul>
        <li><?php echo date('Y-m-d H:i',$add_time);?>:用户下单</li>
		<?php
			$query1="select status,time from logistics where order_id=$order_id order by status asc";
			$res1=mysql_query($query1);
			$logistics_status=array('工作人员准备上门取货','工作人员取货成功','工作人员开始派件','派件成功');
			while($rows1=mysql_fetch_array($res1)){
		?>
		<li><?php echo date('Y-m-d H:i',$rows1['time']); ?>:<?php echo $logistics_status[$rows1['status']-1];?></li>
		<?php
		}
		?>
    </ul>
</div>
<?php
                }
				if($count==0){
					echo "<center><b>没有相关信息！</b></center>";
				}else if($count>$pagesize){
					echo showPage('user_new.php',$page,$pagecount);
				}else{
					echo "";
				}
?>      



</body>
</html>