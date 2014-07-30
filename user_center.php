<?php 
include_once('function.php');
checkUser();
$title="个人中心";
include_once('include/header.php');
$user=getUserInfoById($user_id);
?>
<div class="clearfix"></div>
<div class="container">
<br><br>
    <div class="slide_content" style="float:left;width:260px">
       <div class="bs-docs-sidebar">
          <ul class="nav nav-list bs-docs-sidenav">
            <li class=""><a href="#user_book"><i class="icon-chevron-right"></i>在售图书</a></li>
            <li class=""><a href="#user_trade"><i class="icon-chevron-right"></i>物流查询</a></li>
            <li class=""><a href="#user_get"><i class="icon-chevron-right"></i>购买记录</a></li>
            <li class=""><a href="#user_post"><i class="icon-chevron-right"></i>出售记录</a></li>
            <li class=""><a href="#user_info"><i class="icon-chevron-right"></i>个人信息</a></li>            
            <li class=""><a href="#user_password"><i class="icon-chevron-right"></i>修改密码</a></li>
          </ul>
        </div>    
    </div>


    <div class="main_content" style="float:left">
		<div class="user_box" id="user_book1" style="display:none">
        	<div class="alert fade in">
            	<strong>注意：</strong>您同时只能发布五本图书，请及时将图书下架
          	</div>        
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>图书名称</th>
                  <th>发布时间</th>
                  <th>自动下架时间</th>
                  <th>物流方式</th>
                  <th>销售状况</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			      $query="select book_id,book_name,add_time,send_type,wanted from book where user_id=$user_id and status=0 order by book_id desc";
				  $res=mysql_query($query);
				  while($rows=mysql_fetch_array($res)){  
			  ?>
                <tr>
                  <td><?php echo $rows['book_name']; ?></td>
                  <td><?php echo date('Y-m-d',$rows['add_time']); ?></td>
                  <td><?php echo date('Y-m-d',$rows['add_time']+2592000); ?></td>
                  <td><?php echo $rows['send_type']; ?></td>
                  <td><?php echo $rows['wanted']; ?>人想购买</td>
                  <td><input type="hidden" value="<?php echo $rows['book_id'];?>" class="book_id"/><a href="#" class="down">下架</a></td>
                </tr>
                <?php
				}
				?>
              </tbody>
            </table>        
        </div>
		<div class="user_box" id="user_trade1" style="display:none">
        	<iframe src="iframe_trade.php" frameborder="0" scrolling="no" width="100%" height="820px"></iframe>
        </div>
		<div class="user_box" id="user_get1" style="display:none">
            <table class="table table-striped"><!-- 只显示一年内的信息 --><!-- 购买记录 -->
              <thead>
                <tr>
                  <th>图书名称</th>
                  <th>下单时间</th>
                  <th>物流方式</th>
                  <th>备注信息</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			      $query="select book_id,add_time,seller_id from book_order where buyer_id=$user_id order by order_id desc";
				  $res=mysql_query($query);
				  while($rows=mysql_fetch_array($res)){
				     $book=getBookBasicInfoById($rows['book_id']);
					 $book_name=$book['book_name'];
					 $seller=getUserInfoById($rows['seller_id']);  
			  ?>
                <tr>
                  <td><?php echo $book_name;?></td>
                  <td><?php echo date('Y-m-d',$rows['add_time']);?></td>
                  <td><?php echo $book['send_type'];?></td>
                  <td>
				         <?php if($book['send_type']=="自己联系")echo "联系人：".$seller['user_name']."（".$seller['phone']."）";?>
				  </td>
                </tr>
				<?php
				}
				?>
				<?php
			      $query="select book_id,add_time,seller_id from temporary_order where buyer_id=$user_id order by id desc";
				  $res=mysql_query($query);
				  while($rows=mysql_fetch_array($res)){
				     $book=getBookBasicInfoById($rows['book_id']);
					 $book_name=$book['book_name'];
					 $seller=getUserInfoById($rows['seller_id']);  
			  ?>
                <tr>
                  <td><?php echo $book_name;?></td>
                  <td><?php echo date('Y-m-d',$rows['add_time']);?></td>
                  <td><?php echo $book['send_type'];?></td>
                  <td>
				         联系人：<?php echo $seller['user_name'];?>（<?php echo $seller['phone'];?>）
				  </td>
                </tr>
				<?php
				}
				?>
              </tbody>
            </table>        
        </div>
		<div class="user_box" id="user_post1" style="display:none">
            <table class="table table-striped"><!-- 只显示一年内的信息 --><!-- 出售记录 -->
              <thead>
                <tr>
                  <th>图书名称</th>
                  <th>出售时间</th>
                  <th>物流方式</th>
                  <th>状态</th>
				  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <?php
			      $query="select book_id,book_name,send_type,add_time,status from book where user_id=$user_id order by status asc, book_id desc";
				  $res=mysql_query($query);
				  while($rows=mysql_fetch_array($res)){
					 $book_name=$rows['book_name']; 
			  ?>
                 <tr>
				  <input type="hidden" class="book_id" value="<?php echo $rows['book_id'];?>" />
                  <td><?php echo $book_name;?></td>
                  <td><?php echo date('Y-m-d',$rows['add_time']);?></td>
                  <td><?php echo $rows['send_type'];?></td>
                  <td class="status"><?php if($rows['status']==0) echo "在售"; else if($rows['status']==1) echo "已下架";?></td>
				  <td>
				   	<?php
						if($rows['status']==0) echo "<a href='#' class='off'>下架</a>";
						elseif($rows['status']==1) echo "<a href='#' class='on'>上架</a>";
					?>
				  </td>
                </tr>
				<?php
				}
				?>
              </tbody>
            </table>        
        </div>
		<div class="user_box" id="user_info1" style="display:none">
        	<div class="alert fade in">
            	<strong>隐私声明：</strong>您的个人信息仅用作图书出售时的个人联系方式，非本校同学无法获取你的信息。
          	</div>
        	<form action="user_do.php?op=edit" method="post">
				<input type="hidden" value="<?php echo $user_id?>" name="user_id" />
            	<label>用户昵称</label>
                <input type="text" value="<?php echo $user['user_name']?>" name="user_name">
                <label>联系电话</label>
                <input type="text" value="<?php echo $user['phone']?>" name="phone">
                <label>宿舍</label>
                <input type="text" value="<?php echo $user['address']?>" name="address">
                <br>
                <button type="submit" class="btn">确认修改</button>
            </form>
        </div>
        
		<div class="user_box" id="user_password1" style="display:none">
        	<div class="alert fade in" style="display:none;" id="pass_tip_div">
            	<strong>修改错误：</strong><span id="pass_tip_span">您两次输入的密码不一致，请重新输入</span>
          	</div>        
        	<form action="user_do.php?op=updatePass" method="post" name="passForm">
			    <input type="hidden" value="<?php echo $user_id?>" name="user_id" />
            	<label>原密码</label>
                <input type="password" name="oldpass" value="" id="oldpass">
            	<label>新密码</label>
                <input type="password" name="newpass" value="" id="newpass">
            	<label>确认新密码</label>
                <input type="password" name="newpass2" value="" id="newpass2">
                <br>
                <button type="button" class="btn" id="update_pass">确认修改</button>
            </form>
        </div>
    </div>

<div class="clearfix"></div>
<br><br>
</div>
<script>
$(document).ready(function(e) {
	if($.cookie("user_target")){
		var latest_target = $.cookie("user_target");
		$(latest_target + "1").show();
		$("[href='"+latest_target+"']").parent().addClass("active");
	}
	else {
		$("#user_book1").show();
		$(".bs-docs-sidenav li:eq(0)").addClass("active");
	}
	
});
$(".bs-docs-sidenav li a").click(function(){
	var target = $(this).attr("href");
	$(".user_box").hide();
	$(target + "1").show();
	$(".bs-docs-sidenav li").removeClass("active");
	$(this).parent().addClass("active");
	$.cookie("user_target",target);
})
$('.down').click(function(){
   var tr=$(this).parent().parent();
   var book_id=$(this).parent().find('.book_id').val();
   var user_id=<?php echo $user_id;?>;
   if(confirm("确认下架？")){
   $.ajax({
       url:"offTheShelf_ajax.php",
	   type:"POST",
	   data:{book_id:book_id,user_id:user_id},
	   dataType:"json",
	   error:function(){},
	   success:function(data){
           if(data['result']=="success"){
		       tr.remove();
		   }
	   }
   })
 }
})
$('.off').live('click',function(){
   var td=$(this).parent();
   var td_status=$(this).parent().parent().find('.status');
   var book_id=$(this).parent().parent().find('.book_id').val();
   var user_id=<?php echo $user_id;?>;
   $.ajax({
       url:"offTheShelf_ajax.php",
	   type:"POST",
	   data:{book_id:book_id,user_id:user_id},
	   dataType:"json",
	   error:function(){},
	   success:function(data){
           if(data['result']=="success"){
		       td.html('<a href="#" class="on">上架</a>');
			   td_status.text('已下架');
		   }
	   }
   })
})
$('.on').live('click',function(){
   var td=$(this).parent();
   var td_status=$(this).parent().parent().find('.status');
   var book_id=$(this).parent().parent().find('.book_id').val();
   var user_id=<?php echo $user_id;?>;
   $.ajax({
       url:"onTheShelf_ajax.php",
	   type:"POST",
	   data:{book_id:book_id,user_id:user_id},
	   dataType:"json",
	   error:function(){},
	   success:function(data){
           if(data['result']=="success"){
		       td.html('<a href="#" class="off">下架</a>');
			   td_status.text('在售');
		   }else if(data['result']=="full"){
		      alert('同时在售书籍不能超过5本！');
		   }
	   }
   })
})
$('#update_pass').click(function(){
	var oldpass=$('#oldpass').val();
	var newpass=$('#newpass').val();
	var newpass2=$('#newpass2').val();
	if(oldpass==""){
		$('#pass_tip_span').text('原始密码不能为空');
		$('#pass_tip_div').show();
		return false;
	}
	if(newpass==""){
		$('#pass_tip_span').text('新密码不能为空');
		$('#pass_tip_div').show();
		return false;
	}
	if(newpass2==""){
		$('#pass_tip_span').text('确认密码不能为空');
		$('#pass_tip_div').show();
		return false;
	}
	if(newpass2!=newpass){
		$('#pass_tip_span').text('您两次输入的密码不一致，请重新输入');
		$('#pass_tip_div').show();
		return false;
	}
	passForm.submit();
})
</script>
<script src="asset/index_none.js"></script>
<?php include 'include/footer.php' ?>

