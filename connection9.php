 <?php
 
 session_start();
 $empcode = mysqli_connect("localhost", "root", "12345", "ictd");

if(isset($_POST['save_data']))
{
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image= $_POST['image'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $property_option = $_POST['property_option'];
   

    $insert_query = "INSERT INTO `postproperty`( `title`, `description`, `image`, `address`, `city`, `property_option`) VALUES ('$title','$description','$image',' $address',' $city','$property_option')";
       $insert_query_run=mysqli_query($empcode, $insert_query);
    if($insert_query_run)
    {
        $_SESSION['status'] = "Data inserted Successfully";
        header('location:clientpost.php');
    }
    else
    {
        $_SESSION['status'] = "sorry we have problem";
        header('location:clientpost.php');
    }
}


// delete data


//if(isset($_POST['click_delete_btn']))
{

   // $property_id = $_POST['property_id'];

   // $delete_query = "DELETE FROM properties  WHERE id='$property_id'";
   // $delete_query_run = mysqli_query($empcode, $delete_query);

   // if ($delete_query_run) {
        # code...
      //  echo "data deleted successfully";
   // } else {
        # code...
       //// echo "deletion failed";
    }
    
//}



if ($property_data) {
    $title = $property_data['title'];
    $description = $property_data['description'];
    $image = $property_data['image'];
    $address = $property_data['address'];
    $city = $property_data['city'];
    $property_option = $property_data['property_option'];

    // Insert into properties table
    $insert_query = "INSERT INTO properties (title, description, image, address, city, property_option) VALUES ('$title', '$description', '$image', '$address', '$city', '$property_option')";
    $insert_query_run = mysqli_query($conn, $insert_query);

    if ($insert_query_run) {
        echo "Property approved successfully!";
    } else {
        echo "Failed to approve property!";
    }
} else {
    echo "Property not found!";
}




?></php>

