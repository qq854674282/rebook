<?php
include_once('../conn.php');
$article_id=$_POST['article_id'];
$article_title=addslashes(trim($_POST['title']));
$remark=addslashes(trim($_POST['remark']));
$article_content=$_POST['content'];
$update="update article set article_title='$article_title',article_content='$article_content',remark='$remark' where article_id=$article_id";
if(mysql_query($update)){
    echo "<script>alert('修改成功！');location.href='page_list.php'</script>";
}
else{
    echo "<script>alert('修改失败！');location.href='page_edit.php?article_id=$article_id'</script>";
	
}
?>