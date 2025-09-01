<?php
session_start();
$empcode = mysqli_connect("localhost", "root", "12345", "ictd");

if(isset($_POST['save_data'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $property_option = $_POST['property_option'];

    $insert_query = "INSERT INTO `properties`(`title`, `description`,`image`, `address`, `city`, `property_option`) VALUES ('$title', '$description','$image', '$address', '$city', '$property_option')";
    $insert_query_run = mysqli_query($empcode, $insert_query);
    if($insert_query_run) {
        $_SESSION['status'] = "Data inserted Successfully";
    } else {
        $_SESSION['status'] = "Sorry, we have a problem";
    }
    header('location:properties.php');
}

// Delete data
if(isset($_POST['click_delete_btn'])) {
    $property_id = $_POST['property_id'];
    $delete_query = "DELETE FROM properties WHERE property_id='$property_id'";
    $delete_query_run = mysqli_query($empcode, $delete_query);

    if($delete_query_run) {
        echo "Data deleted successfully";
    } else {
        echo "Deletion failed";
    }
}

// Update data
if(isset($_POST['update_data'])) {
    $property_id = $_POST['update_id'];
    $new_property_id = $_POST['property_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $property_option = $_POST['property_option'];

    $update_query = "UPDATE properties SET property_id='$new_property_id', title='$title', description='$description',image='$image', address='$address', city='$city', property_option='$property_option' WHERE property_id='$property_id'";
    $update_query_run = mysqli_query($empcode, $update_query);

    if($update_query_run) {
        $_SESSION['status'] = "Data updated Successfully";
    } else {
        $_SESSION['status'] = "Update failed";
    }
    header('location:properties.php');
}
?>
