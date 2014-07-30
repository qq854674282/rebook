<?php
include_once('../conn.php');
$article_title=addslashes(trim($_POST['title']));
$remark=addslashes(trim($_POST['remark']));
$article_content=$_POST['content'];
$add_time=time();
$insert="insert into article(article_title,article_content,remark,add_time) values('$article_title','$article_content','$remark',$add_time)";
if(mysql_query($insert)){
    echo "<script>alert('发布成功！');location.href='page_list.php'</script>";
}
else{
    echo "<script>alert('发布失败！');location.href='page_new.php'</script>";
	
}
?>