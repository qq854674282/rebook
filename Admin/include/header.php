<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="lib/jquery-ui.min.css" />
    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script>
	$(document).ready(function(){
	 $('.down').click(function(){
   		var tr=$(this).parent().parent();
   		var book_id=$(this).parent().find('.book_id').val();
   		$.ajax({
       		url:"../offTheShelf_ajax.php",
	   		type:"POST",
	   		data:{book_id:book_id},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['result']=="success"){
		       		tr.remove();
		   		}
	   		}
   		})
	 })
	 $('.add_sale').click(function(){
   		var tr=$(this).parent().parent();
   		var book_id=$(this).parent().find('.book_id').val();
   		$.ajax({
       		url:"add_sale_ajax.php",
	   		type:"POST",
	   		data:{book_id:book_id},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['result']=="success"){
		       		tr.remove();
		   		}
	   		}
   		})
	 })
	 $('.delete_sale').click(function(){
   		var tr=$(this).parent().parent();
   		var book_id=$(this).parent().find('.book_id').val();
   		$.ajax({
       		url:"delete_sale_ajax.php",
	   		type:"POST",
	   		data:{book_id:book_id},
	   		dataType:"json",
	   		error:function(){},
	   		success:function(data){
           		if(data['result']=="success"){
		       		tr.remove();
		   		}
	   		}
   		})
	 })
	})
	</script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

  </head>
  <body class=""> 
  <!--<![endif]-->