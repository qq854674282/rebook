<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
 $user_name=$_POST['user_name'];
 $start=$_POST['start'];
 $end=$_POST['end'];
 if($start!=""){
 	$start_time=strtotime($start." 00:00:00");
 }else{
 	$start_time=0;
 }
 if($end!=""){
 	$end_time=strtotime($end." 23:59:59");
 }else{
 	$end_time=0;
 }
?>  
<div class="content">
    
    <div class="header">
        <h1 class="page-title">订单检索</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li>订单管理<span class="divider">/</span></li>
        <li><a href="order_over.php">已完成订单</a><span class="divider">/</span></li>
        <li class="active">订单检索</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                    

<div class="row-fluid">
    <div class="block span12">
        <a href="#search" class="block-heading" data-toggle="collapse">订单检索</a>
        <div id="search" class="block-body collapse in">
        	<br>
        	<form action="order_search.php" class="form-search">
                <input type="text" class="input-medium search-query" placeholder="买家或卖家昵称" name="user_name">
                <input type="text" class="input-large search-query" placeholder="起始时间（如：2012-12-12）" name="start" id="start">
                <input type="text" class="input-large search-query" placeholder="终止时间（如：2012-12-12)" name="end" id="end">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser" class="block-heading" data-toggle="collapse">检索结果</a>
        <div id="newuser" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>订单编号</th>
                  <th>买家</th>
                  <th>卖家</th>
                  <th>买家宿舍</th>
                  <th>卖家宿舍</th>
                  <th>图书</th>
                  <th>下单时间</th>
                  <th>订单完成时间</th>
                  <th>物流记录</th>
                </tr>
              </thead>
              <tbody>
              <?php
			  $query="select order_id,buyer_id,seller_id,book_id,add_time,done_time from book_order where status=1 ";
			  if($user_name!=""){
			  		$query1="select user_id from user where user_name='$user_name'";
					$res1=mysql_query($query1);
					$row1=mysql_fetch_array($res1);
					$user_id=$row1['user_id'];
			  		$query.="and buyer_id=$user_id or seller_id=$user_id ";
			  }
			  if($start_time!=0){
			  		$query.="and add_time>$start_time ";
			  }
			  if($end_time!=0){
			  		$query.="and add_time<$end_time ";
			  }
			  $query.="order by order_id asc";
			  $res=mysql_query($query);
			  $i=0;
			  while($rows=mysql_fetch_array($res)){
			  	$buyer=getBuyerSellerInfoById($rows['buyer_id']);
				$seller=getBuyerSellerInfoById($rows['seller_id']);
			  ?>
				<tr>
				  <td><?php echo $rows['order_id'];?></td>
                  <td><?php echo $buyer['user_name'];?></td>
                  <td><?php echo $seller['user_name'];?></td>
                  <td><?php echo $buyer['address'];?></td>
                  <td><?php echo $seller['address'];?></td>
				  <td><a href='../book.php?book_id=<?php echo $rows['book_id'];?>' target="_blank"><?php echo getBookNameById($rows['book_id']);?></a></td>
                  <td><?php echo date('Y-m-d H:i',$rows['add_time']);?></td>
				  <td><?php echo date('Y-m-d H:i',$rows['done_time']);?></td>
				  <td>
				  		<a href='javascript:;' class='ems'>物流记录</a>
						<ul class='hide'>
							<li>【2012-12-12-23:00】用户下单</li>
							<li>【2012-12-12-23:00】工作人员准备上门取货</li>
							<li>【2012-12-12-23:00】工作人员取货成功</li>
							<li>【2012-12-12-23:00】工作人员准备送货</li>
							<li>【2012-12-12-23:00】工作人员送货成功</li>
						</ul>
				  </td>
				  </tr>
              <?php
			  		$i++;
			  }
			  ?>
              </tbody>

            </table>
			<?php
				 if($i==0){
				 	echo "<center><b>没有相关信息！</b></center>";
				 }
			 ?>  
        </div>
    </div>
</div>
<script type="text/javascript" src="lib/jquery-ui.min.js"></script>
<script>
$(".ems").click(function(){
	$(this).parent().find("ul").toggleClass("hide","");
});
$("#start,#end").datepicker({dateFormat:"yy-mm-dd"});
</script>
<?php include 'include/footer.php' ?>
