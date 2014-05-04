<?php
if(isset($_COOKIE['user_id'])){
	$user_id=$_COOKIE['user_id'];
	$user_name=getUsernameById($user_id);
	$sell_num=getSellNumByUserId($user_id);
	$words="您当前有".$sell_num."本书正在出售，3本书正在送给您的路上。";
}else{
	$user_name="游客";
	$words="";    
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title;?></title>
<link href="asset/lib/bootstrap/css/bootstrap.css" rel="stylesheet" media="all">
<link href="asset/style.css" rel="stylesheet" media="all">
<script src="asset/jquery-1.10.2.min.js"></script>
</head>
<body>
<header>
	<div class="container logo_line">
    	<a href="index.php" class="pull-left"><img src="dangdang_logo.jpg"></a>
        <div class="pull-right user_log_info">
        	欢迎您，<a href="#"><?php echo $user_name;?></a>。<?php echo $words;?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="nav_line">
    	<div class="container">
        	<a href="javascript:;" class="pull-left nav_main nav_current">图书分类</a>
            <a href="sale.php" class="pull-left">图书促销</a>
            <a href="add_book.php" class="pull-left">出售图书</a>
            <a href="user_center.php" class="pull-left">个人中心</a>            
            <div class="search pull-left">
            	<form action="category.php">
                       <input class="span2"type="text" placeholder="请输入书名">
                       <button class="" type="button">搜索</button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
    	<div class="nav_box">
        	<ul>
				<?php
					 $query="select * from academy order by academy_id asc";
					 $res=mysql_query($query);
					 while($rows=mysql_fetch_array($res)){
				?>
            	<li class="nav_li"><a href="category.php?academy_id=<?php echo $rows['academy_id']?>"><?php echo $rows['academy_name'];?></a></li>
    			<?php
					 }
				?>
            </ul>
        </div>
		<?php
		     		 $query="select * from major group by academy_id order by academy_id asc";
					 $res=mysql_query($query);
					 while($rows=mysql_fetch_array($res)){
					 		$academy_id=$rows['academy_id'];
							
		?>
        <div class="nav_slide nav_slide_hidden">
        	<ul>
			    <?php
				     $query1="select * from major where academy_id=$academy_id order by major_id asc";
					 $res1=mysql_query($query1);
					 while($row1=mysql_fetch_array($res1)){
					 		$major_id=$row1['major_id'];	
							$major_name=$row1['major_name'];			
				?>
            	<li class="nav_slide_li">
                	<a href="category.php?major_id=<?php echo $major_id;?>"><?php echo $major_name;?></a>
                    <ul style="display:none">
                    	<li><a href="category.php?major_id=<?php echo $major_id;?>&grade=1">大一</a><a href="category.php?major_id=<?php echo $major_id;?>&grade=2">大二</a></li>
                    	<li><a href="category.php?major_id=<?php echo $major_id;?>&grade=3">大三</a><a href="category.php?major_id=<?php echo $major_id;?>&grade=4">大四</a></li>
                    </ul>
                </li>
				<?php
					  }
				?>
            </ul>
        </div>    
		<?php
		       }
		?>         
        <div class="clearfix"></div>
    </div>
</header>
<div class="clearfix"></div>