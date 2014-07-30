<?php 
 include '../function.php';
 checkAdmin();
 include 'include/header.php';
 include 'include/navbar.php' ;
 include 'include/sidebar.php';
?>    
<div class="content">
    
    <div class="header">
        <h1 class="page-title">交易数据一览</h1>
    </div>
    
    <ul class="breadcrumb">
        <li class="active"><a href="index.php">交易数据</a><!-- <span class="divider">/</span>--></li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                    

<div class="row-fluid">

    <!--<div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Just a quick note:</strong> Hope you like the theme!
    </div>-->

    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">今日交易数据统计</a>
        <div id="page-stats" class="block-body collapse in">

            <div class="stat-widget-container">
                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo getTodayBooksNum();?></p>
                        <p class="detail">今日发布图书</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo getTodayOrdersNum();?></p>
                        <p class="detail">今日“校园物流”订单</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo getTodayUsersNum();?></p>
                        <p class="detail">今日新增用户</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo getAllBooksNum();?></p>
                        <p class="detail">图书总计</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span6">
        <a href="#newuser" class="block-heading" data-toggle="collapse">新增用户</a>
        <div id="newuser" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>昵称</th>
                  <th>校内邮箱</th>
                  <th>联系电话</th>
                  <th>宿舍</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  $today_start=strtotime(date('Y-m-d 00:00:00'));
			  $query="select user_id,user_name,email,phone,address from user where status=1 and register_time>$today_start order by user_id asc limit 7";
			  $res=mysql_query($query);
			  while($rows=mysql_fetch_array($res)){
			  ?>
                <tr>
                  <td><?php echo $rows['user_name'];?></td>
                  <td><?php echo $rows['email'];?></td>
                  <td><?php echo $rows['phone'];?></td>
                  <td><?php echo $rows['address'];?></td>
                </tr>
			  <?php
			  }
			  ?>              
              </tbody>
            </table>
            <p><a href="user_new.php">查看更多</a></p>
        </div>
    </div>
    <div class="block span6">
        <a href="#neworder" class="block-heading" data-toggle="collapse">新增校园物流订单</a>
        <div id="neworder" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>买家</th>
                  <th>卖家</th>
                  <th>买家宿舍</th>
                  <th>卖家宿舍</th>
                  <th>下单时间</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  $today_start=strtotime(date('Y-m-d 00:00:00'));
			  $query="select buyer_id,seller_id,add_time from book_order where status=0 order by order_id asc limit 7";
			  $res=mysql_query($query);
			  while($rows=mysql_fetch_array($res)){
			  	$buyer=getBuyerSellerInfoById($rows['buyer_id']);
				$seller=getBuyerSellerInfoById($rows['seller_id']);
			  ?>
                <tr>
                  <td><?php echo $buyer['user_name'];?></td>
                  <td><?php echo $seller['user_name'];?></td>
                  <td><?php echo $buyer['address'];?></td>
                  <td><?php echo $seller['address'];?></td>
				  <td><?php echo date('Y-m-d H:i',$rows['add_time']);?></td>
                </tr>
			  <?php
			  }
			  ?> 
              </tbody>
            </table>
            <p><a href="order_new.php">查看更多</a></p>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span6">
        <a href="#newbook" class="block-heading" data-toggle="collapse">新增图书</a>
        <div id="newbook" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>书名</th>
                  <th>分类</th>
                  <th>昵称</th>
                  <th>发布时间</th>
                  <th>交易方式</th>                  
                </tr>
              </thead>
              <tbody>
              <?php
			  	$today_start=strtotime(date('Y-m-d 00:00:00'));
				$query="select book_id,book_name,send_type,add_time,user_id from book where add_time>$today_start limit 7";
				$res=mysql_query($query);
				while($rows=mysql_fetch_array($res)){
			  ?>
                <tr>
                  <td><?php echo $rows['book_name'];?></td>
                  <td>电子-大三</td>
                  <td><?php echo getUserNameById($rows['user_id']);?></td>
                  <td><?php echo date("Y-m-d H:i",$rows['add_time']);?></td>
				  
				  
				  <td>自己联系</td>				  
                </tr>
				<?php
			  	}
			  	?>              
              </tbody>
            </table>
            <p><a href="book_new.php">查看更多</a></p>
        </div>
    </div>
    <div class="block span6">
        <a href="#click" class="block-heading" data-toggle="collapse">网站浏览量</a>
        <div id="click" class="block-body collapse in">
			<div id="my_container">  
        </div>
    </div>
</div>    
<script> 
window.onload = function() {  
	var container = document.getElementById("my_container");  
	var seriesData = [{name:"点击量", data:[330,348,355,345, 350, 348,], color:"RGB(255,0,0)"}];  
	var config = {  
			type : "line",  
			width : 500,   
			height: 350,  
			series: seriesData,  
			container: container,  
			title:"",  
			tooltip : {  
				enable : true  
			},  
			animation :{  
				enable: true  
			},  
			legend : {  
				enable : true  
			},  
			  
			yAxis :{  
				tickSize: 10,  
				title: "点击量"  
			},  
			xAxis :{  
				tickSize: 10,  
				title: "日期",  
				categories: ["12-21", "12-22", "12-23", "12-24", "12-25", "12-26"]  
			}  
	};  
	fishChart.initSettings(config);  
	fishChart.render();  
}  

</script> 
<?php 
include 'include/footer.php' 
?>
