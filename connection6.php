<?php
session_start();
$depcode = mysqli_connect("localhost", "root", "12345", "ictd");

if (isset($_POST['save_data'])) {
    $rental_id = $_POST['rental_id'];
    $customer_id = $_POST['customer_id'];
    $rental_date = $_POST['rental_date'];
    $return_rental = $_POST['return_rental'];

    $query = "INSERT INTO rentals (rental_id, customer_id, rental_date, return_date) VALUES ('$rental_id', '$customer_id', '$rental_date', '$return_rental')";
    $query_run = mysqli_query($depcode, $query);

    if ($query_run) {
        $_SESSION['status'] = "Rental Added Successfully";
    } else {
        $_SESSION['status'] = "Rental Addition Failed";
    }
    header("Location: index.php");
}

if (isset($_POST['click_delete_btn'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM rentals WHERE rental_id='$id'";
    $query_run = mysqli_query($depcode, $query);

    if ($query_run) {
        echo "Rental Deleted Successfully";
    } else {
        echo "Rental Deletion Failed";
    }
}

if (isset($_POST['update_data'])) {
    $id = $_POST['update_id'];
    $rental_id = $_POST['rental_id'];
    $customer_id = $_POST['customer_id'];
    $rental_date = $_POST['rental_date'];
    $return_rental = $_POST['return_rental'];

    $query = "UPDATE rentals SET rental_id='$rental_id', customer_id='$customer_id', rental_date='$rental_date', return_date='$return_rental' WHERE rental_id='$id'";
    $query_run = mysqli_query($depcode, $query);

    if ($query_run) {
        $_SESSION['status'] = "Rental Updated Successfully";
    } else {
        $_SESSION['status'] = "Rental Update Failed";
    }
    header("Location: index.php");
}
?>
