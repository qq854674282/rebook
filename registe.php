<?php 
$user_id=1;
include_once('function.php');
$title="用户注册";
include_once('include/header.php');
?>
<style>
.registerform {
	margin-left:100px;
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
.registe_info {
	width:360px;
}
.registe_info h3 {
	font-size:20px;
	margin:0;
}
.registe_info p {
	text-indent:2em;
	word-wrap:break-word; word-break:normal;
}
</style>
<div class="container">
<br><br>
  <form action="registe_mail.php" class="registerform pull-left" method="post" name="regForm">
      <table>
          <tbody><tr>
              
              <td >昵称：</td>
              <td><input type="text" errormsg="昵称至少6个字符,最多18个字符" datatype="s6-18" class="inputxt Validform_error" name="user_name" value="" nullmsg="请填写信息"></td>
              <td><div class="Validform_checktip Validform_wrong"></div></td>
          </tr>
          <tr>
              <td>手机号码：</td>
              <td><input type="text" errormsg="请输入您的手机号码" datatype="m" class="inputxt Validform_error" name="phone" value="" nullmsg="请填写信息"></td>
              <td><div class="Validform_checktip Validform_wrong"></div></td>
          </tr>

          
          <tr>
              <td>交大邮箱：</td>
              <td>
                  <div class="input-append">
                    <input type="text" errormsg="请输入您的校内邮箱" datatype="*" class="inputxt Validform_error" name="email" value="" nullmsg="请填写信息" id="appendedDropdownButton" style="width:65px">
                    <div class="btn-group">
                      <button class="btn dropdown-toggle" data-toggle="dropdown">
                        <span class="mail_tag" id="mail_tag">@stu.xjtu.edu.cn</span>
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="javascript:;" class="change_tag">@mail.xjtu.edu.cn</a></li><!--Js 代码在最后-->
                        <li><a href="javascript:;" class="change_tag">@stu.xjtu.edu.cn</a></li>
                      </ul>
                    </div>
                  </div>                
              </td>
              <td><div class="Validform_checktip Validform_wrong"></div></td>
          </tr>          
        
          <tr>
              
              <td >宿舍：</td>
              <td><input type="text" errormsg="请填写信息" datatype="*" class="inputxt Validform_error" name="address" value="" nullmsg="请填写信息"></td>
              <td><div class="Validform_checktip "></div></td>
          </tr>

          <tr>
              <td >密码：</td>
              <td><input type="password" value="" name="password" class="inputxt" datatype="*6-16" nullmsg="请设置密码" errormsg="密码范围在6~16位之间" /></td>
              <td><div class="Validform_checktip"></div></td>
          </tr>
          <tr>
              <td >确认密码：</td>
              <td><input type="password" value="" name="password2" tip="test" class="inputxt" datatype="*" recheck="password" nullmsg="请再输入一次密码" errormsg="您两次输入的账号密码不一致" /></td>
              <td><div class="Validform_checktip"></div></td>
          </tr>
          <tr>
              <td ></td>
              <td><input type="checkbox" style="margin:0;" errormsg="请同意本条款" datatype="*" class="inputxt Validform_error" name="address" value="" nullmsg="请同意本条款">&nbsp;我同意本网站的<a href="#">《服务条款》</a></td>
              <td><div class="Validform_checktip"></div></td>
          </tr>                                               
          <tr>

              <td>
			  	  <input type="hidden" id="mail_tag_1" name="mail_tag"/>
                  <input type="button" class="btn" value="注册" id="reg">
              </td>
          </tr>
      </tbody></table>
  </form>
  <div class="registe_info pull-right">
  		<h3>注册说明</h3>
        <p>dwedwedwedwedwedwedwedwedwedwedwed</p>
        <p>dwedwed</p>
  </div>
</div>
<script src="asset/index_none.js"></script>
<script type="text/javascript">
$('#reg').click(function(){
	$('#mail_tag_1').val($('#mail_tag').text());
	regForm.submit();
})
$(function(){	
	$(".registerform").Validform({
		tiptype:2,	
	});
	$(".change_tag").click(function(){
		var tar = $(this).html();
		$(".mail_tag").html(tar);
	});
})

</script>
<script src="asset/Validform_v5.3.2.js"></script>
<?php include 'include/footer.php' ?>