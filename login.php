<?php
$db=mysqli_connect('localhost','root','','register') or die("could not connection_aborted");
?>
<?php
session_start();
$error=array();

if(isset($_POST['submit'])){
  $email= mysqli_real_escape_string($db, $_POST['email']);
  $password= mysqli_real_escape_string($db, $_POST['password']);
  $query="SELECT * FROM admin WHERE password='$password' and email='$email' LIMIT 1";
  $result= mysqli_fetch_assoc(mysqli_query($db,$query));
 if(($result)){
   $_SESSION['email']=$email;
    header("location: dairy.php");
  }
  else{
  array_push($error,"Email or Username does not  match");
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
  <div id="login">
   <div>
     <h2>Secret Dairy</h2>
     <p>Store your thoughts permenantly and secretly</p>
     <p>Log in using your username and password</p>
   </div>
      <nav>

          <form action="login.php" method="post"><br>
             <?php include("errors.php") ?>
           <br><br>
            <input type="email"  id="email" name="email" class="login" placeholder="Your Email" required><i class="fa fa-address-card" ></i><br>
            <input type="password" id="password" name="password" class="login" placeholder ="Password" required><i class="fa fa-address-card" ></i><br><br>
            <input type="submit" class="login" id="submit" value="log In!" name="submit">
          </form>
          <a href="register.php" style="color:#0000ff">Sign Up</a>
        </nav>
      </div>

      </body>
      </html>
