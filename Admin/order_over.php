<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
?>  
<div class="content">
    
    <div class="header">
        <h1 class="page-title">已完成订单</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li>订单管理<span class="divider">/</span></li>
        <li class="active"><a href="order_over.php">已完成订单</a><!-- <span class="divider">/</span>--></li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                    

<div class="row-fluid">
    <div class="block span12">
        <a href="#search" class="block-heading" data-toggle="collapse">订单检索</a>
        <div id="search" class="block-body collapse in">
        	<br>
        	<form action="order_search.php" class="form-search" method="post">
                <input type="text" class="input-medium search-query" placeholder="买家或卖家昵称" name="user_name">
                <input type="text" class="input-large search-query" placeholder="起始时间（如：2012-12-12）" id="start" name="start">
                <input type="text" class="input-large search-query" placeholder="终止时间（如：2012-12-12)" id="end" name="end">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser" class="block-heading" data-toggle="collapse">已完成订单</a>
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
			  //分页
			  $pagesize = 20;
			  $sql_page = "select 1 from book_order where status=1";
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
			  $query="select order_id,buyer_id,seller_id,book_id,add_time,done_time from book_order where status=1 order by order_id asc limit ".$pagestart.",".$pagesize;
			  $res=mysql_query($query);
			  while($rows=mysql_fetch_array($res)){
			  	$buyer=getBuyerSellerInfoById($rows['buyer_id']);
				$seller=getBuyerSellerInfoById($rows['seller_id']);
				$order_id=$rows['order_id'];
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
							<li><?php echo date('Y-m-d H:i',$rows['add_time']);?>:用户下单</li>
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
				  </td>
				  </tr>
              <?php
			  }
			  ?>
              </tbody>

            </table>
        </div>
    </div>
    <?php	
				if($count==0){
					echo "<center><b>没有相关信息！</b></center>";
				}else{
					echo showPage('order_new.php',$page,$pagecount);
				}
	?>    
</div>
<script type="text/javascript" src="lib/jquery-ui.min.js"></script>
<script>
$(".ems").click(function(){
	$(this).parent().find("ul").toggleClass("hide","");
});
$("#start,#end").datepicker({dateFormat:"yy-mm-dd"});
</script>
<?php include 'include/footer.php' ?>
