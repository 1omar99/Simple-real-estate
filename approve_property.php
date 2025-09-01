<?php
session_start();
$empcode = mysqli_connect("localhost", "root", "12345", "ictd");

if(isset($_POST['approve_property_btn'])) {
    $title = $_POST['title'];

    // Fetch the property details
    $query = "SELECT * FROM postproperty WHERE title='$title'";
    $query_run = mysqli_query($empcode, $query);

    if(mysqli_num_rows($query_run) > 0) {
        $property_data = mysqli_fetch_array($query_run);

        $title = $property_data['title'];
        $description = $property_data['description'];
        $image = $property_data['image'];
        $address = $property_data['address'];
        $city = $property_data['city'];
        $property_option = $property_data['property_option'];

        // Insert into properties table
        $insert_query = "INSERT INTO properties (title, description, image, address, city, property_option) VALUES ('$title', '$description', '$image', '$address', '$city', '$property_option')";
        $insert_query_run = mysqli_query($empcode, $insert_query);

        if ($insert_query_run) {
            echo "Property approved successfully!";
        } else {
            echo "Failed to approve property!";
        }
    } else {
        echo "Property not found!";
    }
}
?>
