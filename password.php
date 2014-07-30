<?php 
include_once('function.php');
$title="重置密码";
include_once('include/header.php');
$email_md5=md5("email");
$email=$_GET["$email_md5"];
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
      <p>
      	<form action="resetPass_do.php" name="resetForm">
        	<label>请输入新密码：</label>
        	<input type="password" name="pass" id="pass1">
            <br>
        	<label>请再输入一遍：</label>
        	<input type="password" id="pass2">
          <input type="hidden" name="email" value="<?php echo $email;?>">
            <br>
            <button class="btn" type="button" id="sub">确认更改</button>
        </form>
      </p>
      <div class="alert  alert-error" style="display:none">
        <strong>两次密码输入不一致，请重新输入。</strong>
      </div>
</div>

</div>
<script src="asset/index_none.js"></script>
<script  type="text/javascript">
  $('#sub').click(function(){
  var pass1=$('#pass1').val();
  var pass2=$('#pass2').val();
  if(pass1==""){
    alert("密码不能为空");
    return false;
  }
  if(pass2==""){
    alert("确认密码不能为空");
    return false;
  }
  if(pass1!=pass2){
    alert("两次密码输入不一致");
    return false;
  }
  resetForm.submit();
})
</script>
<?php include 'include/footer.php' ?>