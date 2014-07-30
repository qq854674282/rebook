<?php
if(isset($_COOKIE['user_id'])){
	$user_id=$_COOKIE['user_id'];
	$user=getUserInfoById($user_id);
	$words="您当前有".$user['sell_num']."本书正在出售，".$user['buy_num']."本书正在送给您的路上。";
	$user_name=$user['user_name'];
}else{
    $user_id=0;
	$user_name="游客";
	$words='<a href="sig_in.php">登录</a>/<a href="registe.php">注册</a>';    
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title;?></title>
<link href="asset/lib/bootstrap/css/bootstrap.css" rel="stylesheet" media="all">
<link href="asset/style.css" rel="stylesheet" media="all">
<script src="asset/jquery-1.7.2.min.js"></script>
</head>
<body>
<header>
	<div class="container logo_line">
    	<a href="index.php" class="pull-left"><img src="dangdang_logo.jpg"></a>
        <div class="pull-right user_log_info">
        	欢迎您，<a href="user_center.php"><?php echo $user_name;?></a>。<?php echo $words;?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="nav_line">
    	<div class="container">
        	<a href="javascript:;" class="pull-left nav_main<?php if($title=="睿书网")echo " nav_current";?>">图书分类</a>
            <a href="index.php" class="pull-left">首页</a>
            <a href="sale.php" class="pull-left <?php if($title=="图书促销")echo " nav_current";?>">图书促销</a>
            <a href="add_book.php" class="pull-left <?php if($title=="发布图书")echo " nav_current";?>">出售图书</a>
            <a href="user_center.php" class="pull-left <?php if($title=="个人中心")echo " nav_current";?>">个人中心</a>            
            <div class="search pull-left">
            	<form action="search_book.php" method="post" name="searchForm">
                       <input class="span2"type="text" placeholder="请输入书名" name="book_name" id="book_name">
                       <button class="" type="button" id="search">搜索</button>
                </form>
            </div>
			<?php 
				if($user_id!=0){
			?>
			<a href="logout.php" class="pull-right">安全退出</a>
			<?php
			}
			?>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
    	<div class="nav_box" style="display:none">
        	<ul>
				<?php
					 $query="select * from academy order by academy_id asc";
					 $res=mysql_query($query);
					 while($rows=mysql_fetch_array($res)){
				?>
            	<li class="nav_li"><a href="category.php?academy_id=<?php echo $rows['academy_id']?>"><?php echo $rows['abbreviation'];?></a></li>
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
        	<ul class="nav_slide_nav">
			    <?php
				     $query1="select * from major where academy_id=$academy_id order by major_id asc";
					 $res1=mysql_query($query1);
					 while($row1=mysql_fetch_array($res1)){
					 		$major_id=$row1['major_id'];	
							$major_name=$row1['abbreviation'];			
				?>
            	<li class="nav_slide_li">
                	<a href="category.php?major_id=<?php echo $major_id;?>"><?php echo $major_name;?></a>
                    <ul style="display:none">
					<?php
						if($major_id<84){
					?>
                    	<li><a href="category.php?major_id=<?php echo $major_id;?>&grade=1">大一</a><a href="category.php?major_id=<?php echo $major_id;?>&grade=2">大二</a></li>
                    	<li><a href="category.php?major_id=<?php echo $major_id;?>&grade=3">大三</a><a href="category.php?major_id=<?php echo $major_id;?>&grade=4">大四</a></li>
						<li><a href="category.php?major_id=<?php echo $major_id;?>&grade=0">其他</a></li>
					<?php
						}
						if($major_id==84||$major_id==85){
							$query2="select * from class where major_id=$major_id order by class_id asc";
					 		$res2=mysql_query($query2);
					 		while($row2=mysql_fetch_array($res2)){
					 			$class_id=$row2['class_id'];	
								$class_name=$row2['abbreviation'];
						
					?>
                    	<li><a href="category.php?class_id=<?php echo $class_id;?>"><?php echo $class_name?></a></li>
					<?php
							}
						}
					?>
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
<script>
$('#search').click(function(){
	var book_name=$('#book_name').val();
	if(book_name==''){
	 	alert('请输入您要查找的书名');
		return false;
	}
	searchForm.submit();
})
</script>