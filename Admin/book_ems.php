<?php include 'include/header.php' ?>
<?php include 'include/navbar.php' ?>
<?php include 'include/sidebar.php' ?>
    

    
<div class="content">
    
    <div class="header">
        <h1 class="page-title">"校园物流"图书</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li>图书管理<span class="divider">/</span></li>
        <li class="active"><a href="book_ems.php">"校园物流"图书</a><!-- <span class="divider">/</span>--></li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                    

<div class="row-fluid">
    <div class="block span12">
        <a href="#search" class="block-heading" data-toggle="collapse">图书检索</a>
        <div id="search" class="block-body collapse in">
        	<br>
        	<form action="book_search.php" class="form-search">
                <input type="text" class="input-medium search-query" placeholder="卖家昵称、图书名称">
                <input type="text" class="input-large search-query" placeholder="起始时间（如：2012-12-12）">
                <input type="text" class="input-large search-query" placeholder="终止时间（如：2012-12-12)">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser" class="block-heading" data-toggle="collapse">"校园物流"图书</a>
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
			  for($i=1;$i<=10;$i++){
			  	echo "
				<tr>
				  <td>12e12</td>
				  <td><a href='../book.php' target='_blank'>高等数学</a></td>
				  <td>电子-大三</td>			  
                  <td>Mark</td>
                  <td>校园物流</td>
                  <td>2012-12-12-23：43</td>
                  <td>2012-12-12-23：43</td>
                  <td>交大东校区</td>
				  <td>23人查看过</td>
                  <td><a href='#'>下架</a></td>
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
