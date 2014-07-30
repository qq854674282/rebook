<?php 
include_once('register_do.php');
include_once('include/header.php');
?>
<style>
.registe {
	border-color: #CCCCCC;
    border-style: solid;
    border-width: 1px;
    box-shadow: 5px 5px 5px #E4E4E4;
	padding:10px 20px;
	margin-top:29px;
	margin-left:auto;
	margin-right:auto;
	margin-bottom:10px;
	width:400px;
}
.mybtn {
	margin-bottom:10px;
	display:block;
}
</style>
<div class="container">
<?php
if($flag==1){
?>
  <div class="registe">
  	<p>我们已经将一封验证邮件发送到了您的邮箱中，请登录邮箱激活您的帐号。</p>
    <a href="http://stu.xjtu.edu.cn/" target="_blank" class="btn mybtn">点击此处登陆邮箱</a>
    <p>没有激活的账户是无法登录的。</p>
    <a href="javascript:;" onClick="$(this).hide();$('.registe_mail').show()">邮箱填错了，我要重新填写</a>
    <form class="registe_mail" style="display:none" action="update_email_do.php" method="post">
		<input type="hidden" value="<?php echo $newuser_id;?>" name="user_id" />
    	<input type="text" placeholder="请填写正确的校内邮箱" name="email">
        <br>
        <button class="btn" type="submit">重新发送验证邮件</button>
    </form>
  </div>
<?php
}
?>
</div>
<script src="asset/index_none.js"></script>
<script src="asset/Validform_v5.3.2.js"></script>
<?php include 'include/footer.php' ?>