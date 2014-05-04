<?php
include_once('function.php');
$book_name=addslashes($_POST['book_name']);
$author=addslashes($_POST['author']);
$publisher=addslashes($_POST['publisher']);
$version=addslashes($_POST['version']);
$price=addslashes($_POST['price']);
$book_desc=addslashes($_POST['book_desc']);
$zone=$_POST['zone'];
$send_type=$_POST['send_type'];
$add_time=time();
//$user_id=$_COOKIE['user_id'];
$user_id=1; //临时性id值
$academy_id=0;
$major_id=0;
$class_id=0;
$class_1=$_POST['class_1'];
if($class_1=="专业书籍"){
   $academy_name=$_POST['class_2'];
   $academy_id=getIdByName('academy',$academy_name);
   $major=$_POST['class_3'];
   $major_id=getIdByName('major',$major);
   $grade_name=$_POST['class_4'];
}elseif($class_1=="公共课"){
   $book_class=$_POST['class_2'];
   $class_id=getIdByName('academy',$academy_name);
   $grade_name=$_POST['class_3']; 
}
echo $grade_name."<br>";
if($grade_name=="大一"){
       $grade=1;
}elseif($grade_name=="大二"){
       $grade=2;
}elseif($grade_name=="大三"){
       $grade=3;
}elseif($grade_name=="大四"){
       $grade=4;
}
if(!is_dir("book_images")){
		mkdir("book_images");
}
$file=$_FILES['book_image']; 						
if(is_uploaded_file($file['tmp_name'])){
	    $str=substr($file['name'],-4,4);
		$path="book_images/".$add_time.$str;
	    move_uploaded_file($file['tmp_name'],$path);
		echo $path;				
}
$insert="insert into book(book_name,author,publisher,version,book_price,zone,send_type,book_desc,add_time,user_id,academy_id,major_id,class_id,book_image) values('$book_name','$author','$publisher','$version',$price,$zone,$send_type,'$book_desc',$add_time,$user_id,$academy_id,$major_id,$class_id,'$path')";
echo $insert;
if(mysql_query($insert)){
    echo "<script>alert('发布成功！');location.href='index.php'</script>";
}
else{
    /*echo "<script>alert('发布失败！');location.href='add_book.php'</script>";*/
}
?>