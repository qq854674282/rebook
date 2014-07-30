<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
?> 
<div class="content">
    
    <div class="header">
        <h1 class="page-title">所有用户</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li>用户管理<span class="divider">/</span></li>
        <li class="active"><a href="user_all.php">所有用户</a><!-- <span class="divider">/</span>--></li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                    

<div class="row-fluid">
    <div class="block span12">
        <a href="#search" class="block-heading" data-toggle="collapse">用户搜索</a>
        <div id="search" class="block-body collapse in">
        	<br>
        	<form action="user_search.php" class="form-search" method="post">
                <input type="text" class="input-medium search-query" placeholder="用户昵称、邮箱或电话" name="search">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser" class="block-heading" data-toggle="collapse">所有用户</a>
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
			  //分页
			  $pagesize = 20;
			  $sql_page = "select 1 from user where status=1";
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
			  $query="select user_id,user_name,email,phone,address from user where status=1 order by user_id asc limit ".$pagestart.",".$pagesize;
			  $res=mysql_query($query);
			  $i=1;
			  while($rows=mysql_fetch_array($res)){
			  ?>
                <tr>
				  <td><?php echo $i;?></td>
                  <td><?php echo $rows['user_name'];?></td>
                  <td><?php echo $rows['email'];?></td>
                  <td><?php echo $rows['phone'];?></td>
                  <td><?php echo $rows['address'];?></td>
				  <td><a href='user_spec.php?user_id=<?php echo $rows['user_id'];?>'>相关交易</a></td>
                </tr>
			  <?php
			    $i++;
			  }
			  ?>              
              </tbody>
            </table>
        </div>
    </div>
    <?php	
				if($count==0){
						  echo "<center><b>没有相关信息！</b></center>";
					}else if($count>20){
					      echo showPage('user_all.php',$page,$pagecount);
					}else{
					      echo "";
					}
	?>    
</div>
<?php include 'include/footer.php' ?>
