<?php

session_start();
include("connection2.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
{

$name =$_POST['name'];
$email =$_POST['email'];
$password =$_POST['password'];
$cpassword =$_POST['cpassword'];
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

if(!empty($email) && !empty($password) && !is_numeric($email))
{



    $query ="INSERT INTO users (name,email,password,cpassword) VALUES ('$name','$email','$password','$cpassword')";

    mysqli_query($usercode, $query);

    echo "<script type='text/javascript'>alert('Succesfully Register')</script>";
}

else
{

    echo "<script type='text/javascript'>alert('Please Enter Some Valid information')</script>";
}

    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">
    
   <form  method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="fullname" required placeholder="enter your fullName">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name=" cpassword" required placeholder="enter your Repeat_password">
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>