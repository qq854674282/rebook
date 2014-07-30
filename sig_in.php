<?php 
include_once('function.php');
$title="用户登录";
include_once('include/header.php');
?>
<style>
.registerform {
	margin-top:20px;
	padding-top:40px;
	padding-left:100px;
	padding-bottom:40px;
}
.registerform li {
	list-style:none;
}
.registerform input {
	margin-bottom:0;
}
.registerform td {
	padding-bottom:15px;
}
.Validform_right {
	display:none;
}
.Validform_wrong {
	color:#999;
}
.registe {
	border-color: #CCCCCC;
    border-style: solid;
    border-width: 1px;
    box-shadow: 5px 5px 5px #E4E4E4;
	padding:10px 20px;
	margin-top:49px;
}
.mybtn {
	margin-bottom:10px;
	display:block;
}
.title_a {
	margin-top:11px;
	margin-left:20px;
}
</style>
<div class="container">
  <form action="login_do.php" method="post" class="registerform pull-left">
  	 <h4 class="pull-left">登录</h4><a href="registe.php" class="pull-left title_a">免费注册</a>
     <br><br>
      <table>
          <tbody><tr>
          <tr>
              <td>校内邮箱：</td>
              <td><input type="text" errormsg="邮箱格式错误" datatype="mail" class="inputxt Validform_error" name="email" nullmsg="请填写信息"></td>
              <td><div class="Validform_checktip Validform_wrong"></div></td>
          </tr>
          <tr>
              <td >密码：</td>
              <td><input type="password" name="password" class="inputxt" datatype="*6-16" nullmsg="请输入密码" errormsg="密码范围在6~16位之间" /></td>
              <td><div class="Validform_checktip"></div></td>
          </tr>
          <tr>
              <td>
                  <input type="submit" class="btn" value="登录">
              </td>
              <td><a href="forget.php">忘记密码？</a></td>
          </tr>
      </tbody></table>
  </form>
  <div class="registe pull-right">
  	<p>还没有账号？</p>
    <p>简单几步即可完成注册。</p>
    <a href="registe.php" class="btn mybtn">点击此处注册</a>
    <p>出售图书、购买图书，一切都是那么简单。</p>
    <p>校内用户的严格限制，保证您绝不会受到骚扰</p>
  </div>
</div>
<script src="asset/index_none.js"></script>
<script type="text/javascript">
$(function(){	
	$(".registerform").Validform({
		tiptype:2,
		datatype:{
			"mail":/^\w+([-+.']\w+)*@(\w)+(\.xjtu.edu.cn)$/,
		},		
	});
})

</script>
<script src="asset/Validform_v5.3.2.js"></script>
<?php include 'include/footer.php' ?>