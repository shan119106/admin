<?php
$db=mysqli_connect('localhost','root','','register') or die("could not connection_aborted");
session_start();
$email =$_SESSION['email'];
$query ="SELECT * FROM admin WHERE email = '$email' LIMIT 1";
$result=mysqli_fetch_assoc(mysqli_query($db,$query));
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="dairy.css">
</head>
<body>
	<div class="head">
		<div><h2>Secret Dairy</h2></div>
		<div class="logout"><a href="logout.php">Logout</a></div>
	</div>
	<div>
		<textarea id="content"><?php echo $result['content'] ?></textarea>
	</div>
</body>
</html>
<script type="text/javascript">
	
		"use strict";
	$(document).ready(function(){
		$("#content").keyup(function(){
			var query=$(this).val();
			if(query !=''){
				$.ajax({
					url:"details.php",
					type:"POST",
					data:{query:query},
					success:function(data){
						
					}

				});
			}
		});
	});
</script>
