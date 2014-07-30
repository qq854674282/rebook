<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
?> 
<div class="content">
    
    <div class="header">
        <h1 class="page-title">未完成订单</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li>订单管理<span class="divider">/</span></li>
        <li class="active"><a href="order_over.php">未完成订单</a><!-- <span class="divider">/</span>--></li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                    



<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser" class="block-heading" data-toggle="collapse">未完成订单</a>
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
                  <th>物流状态更新时间</th>
                  <th>物流状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  //分页
			  $pagesize = 20;
			  $sql_page = "select 1 from book_order where status=0";
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
			  $query="select order_id,buyer_id,seller_id,book_id,add_time,logistics_status from book_order where status=0 order by order_id asc limit ".$pagestart.",".$pagesize;
			  $res=mysql_query($query);
			  while($rows=mysql_fetch_array($res)){
			  	$buyer=getBuyerSellerInfoById($rows['buyer_id']);
				$seller=getBuyerSellerInfoById($rows['seller_id']);
			  ?>
				<tr>
				  <input type="hidden" value="<?php echo $rows['order_id'];?>" class="order_id" />
				  <td><?php echo $rows['order_id'];?></td>
                  <td><?php echo $buyer['user_name'];?></td>
                  <td><?php echo $seller['user_name'];?></td>
                  <td><?php echo $buyer['address'];?></td>
                  <td><?php echo $seller['address'];?></td>
				  <td><a href='../book.php?book_id=<?php echo $rows['book_id'];?>' target="_blank"><?php echo getBookNameById($rows['book_id']);?></a></td>
                  <td><?php echo date('Y-m-d H:i',$rows['add_time']);?></td>
                  <td>2012-12-12-12:89</td>
				  <td>
				  		<select name="order_status" class="order_status">
							<option value="0" <?php if($rows['logistics_status']==0) echo "selected=true"?>>下单成功</option>
							<option value="1" <?php if($rows['logistics_status']==1) echo "selected=true"?>>工作人员准备上门取货</option>
							<option value="2" <?php if($rows['logistics_status']==2) echo "selected=true"?>>工作人员取货成功</option>
							<option value="3" <?php if($rows['logistics_status']==3) echo "selected=true"?>>工作人员准备送货</option>
							<option value="4" <?php if($rows['logistics_status']==4) echo "selected=true"?>>工作人员送货成功</option>
						</select>
				  </td>
				  <td><a href='#' class="delete_order">删除</a></td>
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
<?php include 'include/footer.php' ?>
<script>
$('.order_status').change(function(){
	var status=$(this).val();
	var order_id=$(this).parent().parent().find('.order_id').val();
	$.ajax({
		url:"update_logistics_status_ajax.php",
		type:"post",
		data:{order_id:order_id,status:status},
		dataType:"json",
		error:function(){},
		success:function(){}
	})
})
$('.delete_order').click(function(){
	var tr=$(this).parent().parent();
	var order_id=tr.find('.order_id').val();
	$.ajax({
		url:"delete_logistics_ajax.php",
		type:"post",
		data:{order_id:order_id},
		dataType:"json",
		error:function(){},
		success:function(){
			tr.remove();
		}
	})
})
</script>
