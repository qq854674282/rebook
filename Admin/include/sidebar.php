   <?php
   		$admin_type=$_COOKIE['admin_type'];
   ?>
    <div class="sidebar-nav">    
        <a href="index.php" class="nav-header"><i class="icon-dashboard"></i>交易数据</a>

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-user"></i>用户管理</a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="user_new.php">今日新增用户</a></li>
            <li ><a href="user_all.php">所有用户</a></li>
        </ul>

        <a href="#order-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-edit"></i>订单管理</a>
        <ul id="order-menu" class="nav nav-list collapse">
            <li ><a href="order_new.php">未完成订单</a></li>
            <li ><a href="order_over.php">已完成订单</a></li>
        </ul>
        
        <a href="#book-menu" class="nav-header" data-toggle="collapse"><i class="icon-book"></i>图书管理</a>
        <ul id="book-menu" class="nav nav-list collapse">
            <li ><a href="book_new.php">今日新增图书</a></li>
            <li ><a href="book_ems.php">“校园物流”图书</a></li>
            <li ><a href="book_self.php">“自己联系”图书”</a></li>
        </ul>
        
        <a href="#sale-menu" class="nav-header" data-toggle="collapse"><i class="icon-shopping-cart"></i>促销图书</a>
        <ul id="sale-menu" class="nav nav-list collapse">
            <li ><a href="sale_add.php">从现有图书中添加</a></li>
            <li ><a href="sale_new.php">全新添加</a></li>
            <li ><a href="sale_list.php">促销图书列表</a></li>
        </ul>
        <?php 
			if($admin_type==1){
		?>
        <a href="category.php" class="nav-header"><i class="icon-tasks"></i>首页展示</a>
              
        <a href="ad.php" class="nav-header"><i class="icon-pushpin"></i>广告位</a>
        
        <a href="#page-menu" class="nav-header" data-toggle="collapse"><i class="icon-inbox"></i>静态页面</a>
        <ul id="page-menu" class="nav nav-list collapse">
            <li ><a href="page_list.php">管理静态页面</a></li>
            <li ><a href="page_new.php">添加静态页面</a></li>
        </ul>

        <a href="#manager-menu" class="nav-header" data-toggle="collapse"><i class="icon-user-md"></i>管理员</a>
        <ul id="manager-menu" class="nav nav-list collapse">
            <li ><a href="manager_list.php">管理员列表</a></li>
			<li ><a href="forbidden_manager_list.php">被禁用管理员列表</a></li>
            <li ><a href="manager_new.php">添加管理员</a></li>
        </ul>

        <a href="switch.php" class="nav-header"><i class="icon-lock"></i>功能开关</a>
		<?php
		}
		?>


    </div>