<?php include 'include/header.php' ?>
<?php include 'include/navbar.php' ?>
<?php include 'include/sidebar.php' ?>
    

    
<div class="content">
    
    <div class="header">
        <h1 class="page-title">所有用户</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li>用户管理<span class="divider">/</span></li>
        <li><a href="user_all.php">所有用户</a><span class="divider">/</span></li>
        <li class="active">用户搜索</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                    

<div class="row-fluid">
    <div class="block span12">
        <a href="#search" class="block-heading" data-toggle="collapse">用户搜索</a>
        <div id="search" class="block-body collapse in">
        	<br>
        	<form action="user_search.php" class="form-search">
                <input type="text" class="input-medium search-query" placeholder="用户昵称、邮箱或电话">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser" class="block-heading" data-toggle="collapse">搜索结果</a>
        <div id="newuser" class="block-body collapse in">
            <table class="table">
              <thead>
                <tr>
                  <th>编号</th>
                  <th>昵称</th>
                  <th>校内邮箱</th>
                  <th>联系电话</th>
                  <th>宿舍</th>
                  <th>用户相关交易</th>
                </tr>
              </thead>
              <tbody>
              <?php
			  for($i=1;$i<=20;$i++){
			  	echo "
                <tr>
				  <td>00123</td>
                  <td>Mark</td>
                  <td>Tompson@stu.xjtu.edu.cn</td>
                  <td>12231231122</td>
                  <td>东二十510</td>
				  <td><a href='#'>图书</a><span class='divider'>/</span><a href='#'>订单</a></td>
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
