<?php

session_start();
include("connection10.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
{

$Name =$_POST['Name'];
$email =$_POST['email'];
$password =$_POST['password'];
$phone =$_POST['phone'];
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

if(!empty($email) && !empty($password) && !is_numeric($email))
{



    $query ="INSERT INTO client (Name,email,password,phone) VALUES ('$Name','$email','$password','$phone')";

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
      <input type="text" name="Name" required placeholder="enter your Name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="phone" name=" phone" required placeholder="enter your phone">
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="loginclient.php">login now</a></p>
   </form>

</div>

</body>
</html>