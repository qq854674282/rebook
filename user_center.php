<?php 
$user_id=1;
include_once('function.php');
include_once('include/header.php');
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
                <tr>
                  <td>高等数学</td>
                  <td>2012-12-12</td>
                  <td>2013-6-12</td>
                  <td>自己联系</td>
                  <td>5人想购买</td>
                  <td><a href="#">下架</a></td>
                </tr>
                <tr>
                  <td>高等数学</td>
                  <td>2012-12-12</td>
                  <td>2013-6-12</td>
                  <td>校园物流</td>
                  <td>出售中</td>
                  <td><a href="#">下架</a></td>
                </tr>
                <tr>
                  <td>高等数学</td>
                  <td>2012-12-12</td>
                  <td>2013-6-12</td>
                  <td>校园物流</td>
                  <td>用户已下单，请等待工作人员上门取件</td>
                  <td><a href="#">下架</a></td>
                </tr>
              </tbody>
            </table>        
        </div>
		<div class="user_box" id="user_trade1" style="display:none">
        	<iframe src="iframe_trade.php" frameborder="0" scrolling="no" width="100%" height="820px"></iframe>
        </div>
		<div class="user_box" id="user_get1" style="display:none">
            <table class="table table-striped"><!-- 只显示一年内的信息 -->
              <thead>
                <tr>
                  <th>图书名称</th>
                  <th>下单时间</th>
                  <th>物流方式</th>
                  <th>备注信息</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>高等数学</td>
                  <td>2012-12-12</td>
                  <td>自己联系</td>
                  <td>联系人：张同学（17623422332）</td>
                </tr>
                <tr>
                  <td>高等数学</td>
                  <td>2012-12-12</td>
                  <td>校园物流</td>
                  <td>2012-12-13-12：43送达</td>
                </tr>
              </tbody>
            </table>        
        </div>
		<div class="user_box" id="user_post1" style="display:none">
            <table class="table table-striped"><!-- 只显示一年内的信息 -->
              <thead>
                <tr>
                  <th>图书名称</th>
                  <th>出售时间</th>
                  <th>物流方式</th>
                  <th>下架时间</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>高等数学</td>
                  <td>2012-12-12</td>
                  <td>自己联系</td>
                  <td>2012-12-12</td>
                </tr>
                <tr>
                  <td>高等数学</td>
                  <td>2012-12-12</td>
                  <td>校园物流</td>
                  <td>2012-12-13-12：43</td>
                </tr>
              </tbody>
            </table>        
        </div>
		<div class="user_box" id="user_info1" style="display:none">
        	<div class="alert fade in">
            	<strong>隐私声明：</strong>您的个人信息仅用作图书出售时的个人联系方式，非本校同学无法获取你的信息。
          	</div>
        	<form>
            	<label>用户昵称</label>
                <input type="text" value="飞翔的老鼠">
                <label>联系电话</label>
                <input type="text" value="17612122134">
                <label>宿舍</label>
                <input type="text" value="东20-510">
                <br>
                <button type="submit" class="btn">确认修改</button>
            </form>
        </div>
        
		<div class="user_box" id="user_password1" style="display:none">
        	<div class="alert fade in">
            	<strong>修改错误：</strong>您两次输入的密码不一致，请重新输入
          	</div>        
        	<form>
            	<label>原密码</label>
                <input type="password" value="">
            	<label>新密码</label>
                <input type="password" value="">
            	<label>确认新密码</label>
                <input type="password" value="">
                <br>
                <button type="submit" class="btn">确认修改</button>
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
</script>
<script src="asset/index_none.js"></script>
<?php include 'include/footer.php' ?>

