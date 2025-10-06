<?php


$usercode = mysqli_connect("localhost", "root", "12345", "ictd");

if(isset($_POST['save_data']))
{   
   
    $Name = $_POST['Name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
   

    $insert_query = "INSERT INTO `client`(`Name`, `email`, `password`, `phone`) VALUES ('$Name','$email','$password','$phone')";
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