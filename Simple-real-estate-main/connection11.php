<?php
session_start();
$empcode = mysqli_connect("localhost", "root", "12345", "ictd");

if(isset($_POST['save_data'])) {
    $title = $_POST['ClientID'];
    $Property_ID = $_POST['Property_ID'];
   

    $insert_query = "INSERT INTO `clientproperty`(`ClientID`, `Property_ID`) VALUES ('$ClientID', '$Property_ID')";
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
    $property_id = $_POST['property_ID'];
    $delete_query = "DELETE FROM clientproperty WHERE ClientID='$ClientID'";
    $delete_query_run = mysqli_query($empcode, $delete_query);

    if($delete_query_run) {
        echo "Data deleted successfully";
    } else {
        echo "Deletion failed";
    }
}

// Update data
if(isset($_POST['update_data'])) {
    $ClientID = $_POST['ClientID'];
    $Property_ID = $_POST['property_ID'];
   

    $update_query = "UPDATE clientproperty SET ClientID='$new_ClientID', title='$title'";
    $update_query_run = mysqli_query($empcode, $update_query);

    if($update_query_run) {
        $_SESSION['status'] = "Data updated Successfully";
    } else {
        $_SESSION['status'] = "Update failed";
    }
    header('location:clientproperties.php');
}
?>
