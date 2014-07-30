<?php 
include_once('function.php');
$title="忘记密码";
include_once('include/header.php');
?>
<style>
.hero-unit {
	font-size:14px;
}
</style>
<div class="container">
<br><br>
    <div class="hero-unit">
      <h3>重置密码</h3>
      <p>请输入您在注册时填写的邮箱（校内邮箱），我们将会把一封密码重置邮件发送至您的邮箱。</p>
      <p>
        	<input type="text" id="email">
            <br>
            <button class="btn" type="submit" id="sub">确认</button>
      </p>
      
      <div class="alert  alert-error" id="fail" style="display:none">
        <strong>邮箱地址错误，请检查您填写的邮箱地址是否与您注册是填写的一致。</strong>
      </div>
            
      <div class="alert  alert-info" id="success" style="display:none">
        <strong>我们已经将密码重置邮件发送至您的邮箱，请登陆后查看。<a href="http://stu.xjtu.edu.cn">点此登录邮箱</a></strong>
      </div>      
    </div>
</div>
<script src="asset/index_none.js"></script>
<?php include 'include/footer.php' ?>
<script type="text/javascript">
  $('#sub').click(function(){
    var email=$('#email').val();
    $.ajax({
       url:"resetPass_ajax.php",
       type:"POST",
       data:{email:email},
       dataType:"json",
       error:function(){},
       success:function(data){
           $('#success').show();
       }
   })
  })
</script>