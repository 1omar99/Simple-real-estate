<?php
session_start();
$depcode = mysqli_connect("localhost", "root", "12345", "ictd");

if (isset($_POST['save_data'])) {
    $property_id = $_POST['property_id'];
    $customer_id = $_POST['customer_id'];
    $listing_date = $_POST['listing_date'];
    $selling_price = $_POST['selling_price'];

    $insert_query = "INSERT INTO `selling`(`property_id`, `owner_id`, `listing_date`, `sale_price`) VALUES ('$property_id','$customer_id','$listing_date','$selling_price')";
    $insert_query_run = mysqli_query($depcode, $insert_query);

    if ($insert_query_run) {
        $_SESSION['status'] = "Data inserted Successfully";
    } else {
        $_SESSION['status'] = "Sorry, we have a problem";
    }
    header('location:selling.php');
}

// Delete data
if (isset($_POST['click_delete_btn'])) {
    $property_id = $_POST['property_id'];

    $delete_query = "DELETE FROM selling WHERE property_id='$property_id'";
    $delete_query_run = mysqli_query($depcode, $delete_query);

    if ($delete_query_run) {
        echo "Data deleted successfully";
    } else {
        echo "Deletion failed";
    }
}

// Update data
if (isset($_POST['update_data'])) {
    $property_id = $_POST['update_id'];
    $new_property_id = $_POST['property_id'];
    $customer_id = $_POST['customer_id'];
    $listing_date = $_POST['listing_date'];
    $selling_price = $_POST['selling_price'];

    $update_query = "UPDATE selling SET property_id='$new_property_id', owner_id='$customer_id', listing_date='$listing_date', sale_price='$selling_price' WHERE property_id='$property_id'";
    $update_query_run = mysqli_query($depcode, $update_query);

    if ($update_query_run) {
        $_SESSION['status'] = "Data updated Successfully";
    } else {
        $_SESSION['status'] = "Update failed";
    }
    header('location:selling.php');
}
?>
