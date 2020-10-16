<?php
session_start();
$db=mysqli_connect('localhost','root','','register') or die("could not connection_aborted");
$error=array();
$username="";
$email="";
$password_1="";
$password_2="";




if(isset($_POST['email'])){
    
    $email= mysqli_real_escape_string($db, $_POST['email']);
    $password= mysqli_real_escape_string($db, $_POST['password']);
  $check_query="SELECT * FROM admin WHERE password='$password' or email= '$email' LIMIT 1";
   $results=mysqli_query($db,$check_query);
   $user= mysqli_fetch_assoc($results);
    if(($user)){
      if($user['email']==$email) {
       array_push($error,"email already exists");

     }
     if($user['password']==$password){
       array_push($error,"password already exits");
     }
    }
    if(count($error)==0){
    $query="INSERT INTO admin (email,password) VALUES('$email','$password')";
    mysqli_query($db,$query);
     $_SESSION['email']=$email;
    header("location: dairy.php");
   
   
   }

 

}
?>
<!DOCTYPE html>
<html>
<head>
<title>login</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="istyle.css">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <div id="register">
   <div>
     <h2>Secret Dairy</h2>
     <p>Store your thoughts permenantly and secretly</p>
     <p>Interested?Sign Up Now</p>
   </div>
      <nav>

          <form action="register.php" method="post"><br>
            <?php
              include("errors.php");?>
              <br><br>
            <input type="email"  id="email" name="email" class="login" placeholder="Your Email" required><i class="fa fa-address-card" ></i><br>
            <input type="password" id="password" name="password" class="login" placeholder ="Password" required><i class="fa fa-address-card" ></i><br><br>
            <input type="submit" class="login" id="submit" value="Sign Up!" name="submit">
          </form>
          <a href="login.php" style="color:#0000ff">Login</a>
        </nav>
      </div>

      </body>
      </html>
