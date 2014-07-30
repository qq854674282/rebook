 <?php
include_once('../function.php');
$title=addslashes(trim($_POST['title']));
$num=addslashes(trim($_POST['num']));
$num=$num*5;//每行显示5项
$weight=addslashes(trim($_POST['weight']));
$add_time=time();
$academy_id=0;
$major_id=0;
$class_id=0;
$class_1=$_POST['class_1'];
if($class_1=="专业书籍"){
   $class_1=1;
   $academy_name=$_POST['class_2'];
   $academy_id=getIdByName('academy',$academy_name);
   $major=$_POST['class_3'];
   $major_id=getIdByName('major',$major);
   $grade_name=$_POST['class_4'];
}elseif($class_1=="公共课"){
   $class_1=2;
   $academy_name=$_POST['class_1'];
   $academy_id=getIdByName('academy',$academy_name);
   $major=$_POST['class_2'];
   $major_id=getIdByName('major',$major);
   $book_class=$_POST['class_3'];
   if($book_class!=""){
   		$class_id=getIdByName('class',$book_class); 
   }
}elseif($class_1=="考研"||$class_1=="其它"){
   $class_1=3;
   $academy_name=$_POST['class_1'];
   $academy_id=getIdByName('academy',$academy_name);
   $major=$_POST['class_2'];
   $major_id=getIdByName('major',$major);
}
$insert="insert into info_column(column_name,class_id,academy_id,major_id,weight,type,num,add_time) values('$title',$class_id,$academy_id,$major_id,$weight,$class_1,$num,$add_time)";
if(mysql_query($insert)){
    echo "<script>alert('发布成功！');location.href='category.php'</script>";
}
else{
   echo "<script>alert('发布失败！');location.href='category.php'</script>";
   //echo $insert;
	
}
?>