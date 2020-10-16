<?php
$db=mysqli_connect('localhost','root','','register');
session_start();
if($_POST['query']){
	$email =$_SESSION['email'];
	$query =$_POST['query'];
	$query="UPDATE admin SET content ='$query' WHERE email ='$email'";
	$result=mysqli_query($db,$query);
	
}
?>