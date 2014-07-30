<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
 $user_id=$_GET['user_id'];
?>  
<div class="content">
    
    <div class="header">
        <h1 class="page-title">“用户名”的相关交易</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li>用户管理<span class="divider">/</span></li>
        <li class="active"><a href="user_all.php">相关交易</a><!-- <span class="divider">/</span>--></li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser" class="block-heading" data-toggle="collapse">发布的图书</a>
        <div id="newuser" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>图书编号</th>
                  <th>图书名称</th>
                  <th>图书分类</th>                  
                  <th>昵称</th>
                  <th>物流方式</th>
                  <th>发布时间</th>
                  <th>自动下架时间</th>
                  <th>发布区域</th>
                  <th>备注</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php
			  $query="select book_id,book_name,user_id,add_time,zone,wanted,send_type from book where user_id=$user_id and status=0 order by book_id desc";
			  $res=mysql_query($query);
			  $count = mysql_num_rows($res);
			  while($rows=mysql_fetch_array($res)){
			  ?>
				<tr>
				  <td><?php echo $rows['book_id'];?></td>
				  <td><a href='../book.php?book_id=<?php echo $rows['book_id'];?>' target='_blank'><?php echo $rows['book_name'];?></a></td>
				  <td>电子-大三</td>				  
                  <td><?php echo getUserNameById($rows['user_id']);?></td>
				  <td><?php echo $rows['send_type'];?></td>
                  <td><?php echo date('Y-m-d H:i',$rows['add_time']);?></td>
                  <td><?php echo date('Y-m-d H:i',$rows['add_time']+2592000);?></td>
                  <td><?php echo $rows['zone'];?></td>
				  <td><?php echo $rows['wanted'];?>人想购买</td>
                  <td><input type="hidden" value="<?php echo $rows['book_id'];?>" class="book_id"/><a href='#' class="down">下架</a></td>
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
				}
	?>   
</div>

<div class="clearfix"></div>

<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser2" class="block-heading" data-toggle="collapse">未完成订单</a>
        <div id="newuser2" class="block-body collapse in">
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
			  $query="select order_id,buyer_id,seller_id,book_id,add_time,logistics_status from book_order where status=0 and buyer_id=$user_id or seller_id=$user_id order by order_id asc";
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
				}
	?>    
</div>

<div class="clearfix"></div>

<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser3" class="block-heading" data-toggle="collapse">已完成订单</a>
        <div id="newuser3" class="block-body collapse in">
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
			  $query="select order_id,buyer_id,seller_id,book_id,add_time,done_time from book_order where status=1 and buyer_id=$user_id or seller_id=$user_id order by order_id asc";
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
				}
	?>    
</div>
<script>
$(".ems").click(function(){
	$(this).parent().find("ul").toggleClass("hide","");
});
</script>
<?php include 'include/footer.php' ?>
