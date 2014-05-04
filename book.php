<?php 
include_once('function.php');
include_once('include/header.php');
$book_id=$_GET['book_id'];
$book=getBookDetailById($book_id);
if($book['zone']==1) $zone="东校区";
else $zone="西校区";
if($book['send_type']==1) $send_type="自己联系";
else $send_type="校园物流";
$time=calculateTime($book['add_time']);
?>
<br><br>
<div class="clearfix"></div>
<div class="container">
    <div class="main_content">
    	<div class="book_content">
        	<img alt="270x360" src="<?php echo $book['book_image'];?>" class="book_content_main pull-left" style="width:200px;height:290px;">
            <div class="book_content_text pull-left">
            	<h3><?php echo $book['book_name'];?></h3>
                <p class="book_content_text_price">￥<?php echo $book['book_price'];?></p>
                <p>作　　者：<?php echo $book['author'];?></p>
                <p>出　版社：<?php echo $book['publisher'];?></p>
                <p>版　　本：<?php echo $book['version'];?></p>
                <p>发布时间：<?php echo $time;?>发布</p>
                <p>送货方式：<?php echo $send_type;?></p>
                <p>发布区域：<?php echo $zone;?></p>
                <a href="#" class="btn" style="margin-top:60px">我要购买(！校园物流)</a>
                <p>当前有<span class="get_number">20</span>人想购买这本书</p>
                <a href="javascript:;" class="get_info">获取发布者联系方式</a>
                <div class="book_saler" style="display:none">
                	<p>发　布者：李同学</p>
                	<p>联系电话：18888888888</p>
                    <a href="javascript:;" class="btn buy_online">我要购买（！自己联系）</a>
                </div>
                <div class="buy_info hide">
                	<p>本书发布人要求您自己联系对方，<br>您可以通过电话联系他完成交易。</p>
                </div>
                <script>
				$(".get_info").click(function(){
					$(this).hide();
					$(".book_saler").slideDown();
				});
				$(".buy_online").click(function(){
					$(this).hide();
					$(".buy_info").show();
					$(".get_number").html(parseInt($(".get_number").html()) + 1);
					
				});				
				</script>
            </div>
            <div class="saler_more">
            	<p>该发布者还在出售</p>
                <ul>
                	<li><a href="book.php">高等数学/魏霞</a></li>
                	<li><a href="book.php">热力学与统计物理/魏霞</a></li>
                	<li><a href="book.php">半导体物理/魏霞</a></li>
                	<li><a href="book.php">电介质物理/魏霞</a></li>
                	<li><a href="book.php">电子光学/魏霞</a></li>
                </ul>
            </div>
            <script>
            $().ready(function(e) {
				$(".saler_more").css("margin-top",240 - $(".saler_more").height());
            });
            </script>
        </div>
        <div class="clearfix"></div>
        <br><br>
        <div class="book_more">
            <div class="book_line_title">
                <p class="book_line_title_1 pull-left">详细介绍</p>
            </div>
            <div class="clearfix"></div>
            <div class="book_more_content">
            	<p>《文学批评方法手册》(第4版)是一本文学批评方法的普及读本，既有批评方法的阐述，又有实践应用的例证。第一版于20世纪60年代中期出版，此后我次修订再版，并被译成西班牙文、葡萄牙文、日文、朝鲜文等多种文字。 </p>
        		<img alt="270x360" data-src="holder.js/600x360">
                <img src="images/89503028-2687-4d36-9bba-3f989c778972_6.jpg">
            </div>      
        </div>
        <div class="clearfix"></div>
        <br><br>
        <div class="book_line">
            <div class="book_line_title">
                <p class="book_line_title_1 pull-left">相关图书</p>
            </div>
            <div class="clearfix"></div>
            <?php
            for ($i=1; $i<=5; $i++)
              include 'include/book_line_box.php'
            ?>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="slide_content">
        <?php
		    include_once('include/recommend_book_list.php');
			include_once('include/latest_book_list.php');
		?>
    </div>
</div>
<script src="asset/index_none.js"></script>
<?php include 'include/footer.php' ?>

