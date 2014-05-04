<?php include 'include/header.php' ?>
<?php include 'include/navbar.php' ?>
<?php include 'include/sidebar.php' ?>
    

    
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
			  for($i=1;$i<=20;$i++){
			  	echo "
				<tr>
				  <td>12e12</td>
                  <td>Mark</td>
                  <td>Tompson</td>
                  <td>东二十510</td>
                  <td>东二十510</td>
				  <td><a href='../book.php'>高等数学</a></td>
                  <td>2012-12-12-12:89</td>
                  <td>2012-12-12-12:89</td>
				  <td>
				  		<select>
							<option>工作人员准备上门取货</option>
							<option>工作人员取货成功</option>
							<option>工作人员准备送货</option>
							<option>工作人员送货成功</option>
						</select>
				  </td>
				  <td><a href='#'>删除</a></td>
                </tr>";
			  }
			  ?>
              </tbody>

            </table>
        </div>
    </div>
    <div class="pagination">
      <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">Next</a></li>
      </ul>
    </div>    
</div>
<?php include 'include/footer.php' ?>
