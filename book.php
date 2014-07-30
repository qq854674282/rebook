<?php 
include_once('function.php');
if(!isset($_GET['book_id'])){
      alertInfo('禁止访问！','index.php');
}
$title="图书详情";
include_once('include/header.php');
$book_id=$_GET['book_id'];
$book=getBookDetailById($book_id);
$user=getUserInfoById($book['user_id']);
$academy_id=$book['academy_id'];
$major_id=$book['major_id'];
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
                <p>送货方式：<?php echo $book['send_type'];?></p>
                <p>发布区域：<?php echo $book['zone'];?></p>
				<?php
				if($book['send_type']=="校园物流"){
				?>
                <a href="#" class="btn" style="margin-top:60px" id="buy">我要购买</a>
				<?php
				}
				?>
				<?php
				if($book['send_type']=="自己联系"){
				?>
                <p>当前有<span class="get_number"><?php echo $book['wanted'];?></span>人想购买这本书</p>
                <a href="javascript:;" class="get_info">获取发布者联系方式</a>
                <div class="book_saler" style="display:none">
                	<p>发　布者：<?php echo $user['user_name'];?></p>
                	<p>联系电话：<?php echo $user['phone'];?></p>
                    <a href="#" class="btn buy_online" id="buy_oneself">我要购买</a>
                </div>
                <div class="buy_info hide">
                	<p>本书发布人要求您自己联系对方，<br>您可以通过电话联系他完成交易。</p>
                </div>
				<?php
				}
				?>
                <script>
				$('#buy').click(function(){
				  var book_id=<?php echo $book_id;?>;
					var seller_id=<?php echo $book['user_id'];?>;
					var buyer_id=<?php echo $user_id;?>;
					if(buyer_id==0){
					    alert('您尚未登录，请登录后再购买！');
						location.href='sig_in.php';
						return false;
					}
					if(buyer_id==seller_id){
					    alert('自己不能买自己发布的书籍！');
						return false;
					}
          if(confirm("确定要购买这本书吗？")){
          
					$.ajax({
         				url: "buy_wuliu_ajax.php",  
         				type: "POST",
        				data:{book_id:book_id,seller_id:seller_id,buyer_id:buyer_id},
         				dataType: "json",
         				error: function(XMLHttpRequest, textStatus, errorThrown) {
                              alert(XMLHttpRequest.status);
                              alert(XMLHttpRequest.readyState);
                              alert(textStatus);
                        }, 
         				success: function(data){
			 				if(data['result']=='success'){
			 			    	alert('购买成功，剩下的就交给我们吧！（您可以到个人中心查看此书的最新物流信息）');
								return false; 
							}
							if(data['result']=='sold'){
			 			    	alert('抱歉，此书已下架！'); 
								return false;
							}
						}
       				});
          }

				})
				$('#buy_oneself').click(function(){
				    var book_id=<?php echo $book_id;?>;
					var seller_id=<?php echo $book['user_id'];?>;
					var buyer_id=<?php echo $user_id;?>;
					if(buyer_id==0){
					    alert('您尚未登录，请登录后再购买！');
						location.href='sig_in.php';
						return false;
					}
					if(buyer_id==seller_id){
					    alert('自己不能买自己发布的书籍！');
						return false;
					}
					$.ajax({
         				url: "buy_oneself_ajax.php",  
         				type: "POST",
        				data:{book_id:book_id,seller_id:seller_id,buyer_id:buyer_id},
         				dataType: "json",
         				error: function(XMLHttpRequest, textStatus, errorThrown) {
                              alert(XMLHttpRequest.status);
                              alert(XMLHttpRequest.readyState);
                              alert(textStatus);
                        }, 
         				success: function(data){
			 				if(data['result']=='success'){
			 			    	alert('购买成功，请联系卖家取书！');
								return false; 
							}
							if(data['result']=='sold'){
			 			    	alert('抱歉，此书已下架！'); 
								return false;
							}
						}
       				});
				})
				$(".get_info").click(function(){
				    var user_id=<?php echo $user_id;?>;
					if(user_id==0){
					    alert('您尚未登录，登录后才能查看发布者联系方式！');
						location.href='sig_in.php';
						return false;
					}
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
            	<?php echo $book['book_desc'];?>
            </div>      
        </div>
        <div class="clearfix"></div>
		<br><br>
        <div class="book_line">
            <div class="book_line_title">
                <p class="book_line_title_1 pull-left">该发布者还在出售</p>
            </div>
            <div class="clearfix"></div>
            <?php
           		include_once('include/other_books_line.php');
            ?>
            <div class="clearfix"></div>
        </div>
        <br><br>
        <div class="book_line">
            <div class="book_line_title">
                <p class="book_line_title_1 pull-left">相关图书</p>
            </div>
            <div class="clearfix"></div>
            <?php
           		include_once('include/relative_book_line.php');
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

