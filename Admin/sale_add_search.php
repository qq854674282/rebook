<?php 
 include 'include/header.php';
 include '../function.php' ;
 checkAdmin();
 include 'include/navbar.php'; 
 include 'include/sidebar.php';
 $book_name=$_POST['book_name'];
 $start=$_POST['start'];
 $end=$_POST['end'];
 if($start!=""){
 	$start_time=strtotime($start." 00:00:00");
 }else{
 	$start_time=0;
 }
 if($end!=""){
 	$end_time=strtotime($end." 23:59:59");
 }else{
 	$end_time=0;
 }
?>    
<div class="content">    
    <div class="header">
        <h1 class="page-title">从现有图书中增加促销图书</h1>
    </div>   
    <ul class="breadcrumb">
    	<li>促销图书<span class="divider">/</span></li>
        <li class="active"><a href="book_new.php">从现有图书中增加促销图书</a><!-- <span class="divider">/</span>--></li>
    </ul>
    <div class="container-fluid">
        <div class="row-fluid">
<div class="row-fluid">
    <div class="block span12">
        <a href="#search" class="block-heading" data-toggle="collapse">图书检索</a>
        <div id="search" class="block-body collapse in">
        	<br>
        	<form action="sale_add_search.php" class="form-search" method="post">
                <input type="text" class="input-medium search-query" placeholder="图书名称" name="book_name" value="<?php echo $book_name;?>">
                <input type="text" class="input-large search-query" placeholder="起始时间（如：2012-12-12）" id="start" name="start" value="<?php echo $start;?>">
                <input type="text" class="input-large search-query" placeholder="终止时间（如：2012-12-12)" id="end" name="end" value="<?php echo $end;?>">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span12">
        <a href="#newuser" class="block-heading" data-toggle="collapse">从现有图书中增加促销图书</a>
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
			  $query="select book_id,book_name,user_id,add_time,zone,wanted,send_type from book where sale=0 and status=0 ";
			  if($book_name!=""){
			  		$query.="and book_name like '%".$book_name."%' ";
			  }
			  if($start_time!=0){
			  		$query.="and add_time>$start_time ";
			  }
			  if($end_time!=0){
			  		$query.="and add_time<$end_time ";
			  }
			  $query.="order by book_id desc";
			  $res=mysql_query($query);
			  $i=0;
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
                  <td><input type="hidden" value="<?php echo $rows['book_id'];?>" class="book_id"/><a href='#' class="add_sale">添加</a></td>
                </tr>
				<?php
					$i++;
				}
				?>
              </tbody>

            </table>
			<?php
				 if($i==0){
				 	echo "<center><b>没有相关信息！</b></center>";
				 }
			 ?> 
        </div>
    </div>    
</div>
<?php include 'include/footer.php' ?>
<script type="text/javascript" src="lib/jquery-ui.min.js"></script>
<script>
$("#start,#end").datepicker({dateFormat:"yy-mm-dd"});
</script>