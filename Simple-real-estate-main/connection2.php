<?php


$usercode = mysqli_connect("localhost", "root", "12345", "ictd");

if(isset($_POST['save_data']))
{   
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
   

    $insert_query = "INSERT INTO `users`(`name`, `email`, `password`, `cpassword`) VALUES ('$name','$email','$password','$cpassword')";
       $insert_query_run=  mysqli_query($usercode, $insert_query);
    if($insert_query_run)
    {
        $_SESSION['status'] = "Data inserted Successfully";
        header('location: userslists.php');
    }
    else
    {
        $_SESSION['status'] = "sorry we have problem";
        header('location: userslists.php');
    }
}

// delete data


if(isset($_POST['click_delete_btn']))
{

    $id = $_POST['id'];

    $delete_query = "DELETE FROM users WHERE id='$id'";
    $delete_query_run = mysqli_query($usercode, $delete_query);

    if ($delete_query_run) {
        # code...
        echo "data deleted successfully";
    } else
     {
        # code...
        echo "deletion failed";
    }
    
}


?>