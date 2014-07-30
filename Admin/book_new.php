<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
 $today_start=strtotime(date('Y-m-d 00:00:00'));
?>     
<div class="content">
    
    <div class="header">
        <h1 class="page-title">今日新增图书</h1>
    </div>
    
    <ul class="breadcrumb">
    	<li>图书管理<span class="divider">/</span></li>
        <li class="active"><a href="book_new.php">今日新增图书</a><!-- <span class="divider">/</span>--></li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
                    



<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser" class="block-heading" data-toggle="collapse">今日新增图书	</a>
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
			  //分页
			  $pagesize = 20;
			  $sql_page = "select 1 from book where add_time>$today_start and status=0";
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
			  $query="select book_id,book_name,user_id,send_type,add_time,zone,wanted from book where add_time>$today_start and status=0 order by book_id desc limit ".$pagestart.",".$pagesize;
			  $res=mysql_query($query);
			  while($rows=mysql_fetch_array($res)){
			  ?>
				<tr>
				  <td><?php echo $rows['book_id'];?></td>
				  <td><a href='../book.php?book_id=<?php echo $rows['book_id'];?>' target='_blank'><?php echo $rows['book_name'];?></a></td>
				  <td><?php echo getClassById($rows['book_id']);?></td>				  
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
				}else{
					echo showPage('user_new.php',$page,$pagecount);
				}
	?>     
</div>
<?php include 'include/footer.php' ?>
