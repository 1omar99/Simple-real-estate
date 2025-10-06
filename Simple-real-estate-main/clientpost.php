<style>
body {
  font-family: Arial, sans-serif;
  background-color: #e9f7ef; /* Light green background */
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

.form-container {
  background-color: #ffffff;
  padding: 30px;
  border: 2px solid #28a745; /* Green border */
  border-radius: 10px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
  max-width: 450px;
  width: 100%;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  color: #28a745; /* Green label color */
  font-weight: bold;
}

.form-group input,
.form-group select {
  width: 100%;
  padding: 12px;
  border: 2px solid #28a745; /* Green border */
  border-radius: 4px;
  background-color: #f8f9fa;
  color: #495057;
}

.form-group input:focus,
.form-group select:focus {
  border-color: #218838; /* Darker green border on focus */
  outline: none;
}

.modal-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 25px;
}

.btn {
  padding: 12px 25px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.btn-primary {
  background-color: #28a745; /* Green button */
  color: #ffffff;
}

.btn-primary:hover {
  background-color: #218838; /* Darker green on hover */
}

.btn-secondary {
  background-color: #6c757d; /* Gray button */
  color: #ffffff;
}

.btn-secondary:hover {
  background-color: #5a6268; /* Darker gray on hover */
}



</style>







<form action="connection9.php" method="POST">
      <div class="modal-body">
      
       

        <div class="form-group">
          <label for=""> title</label>
          <input type="text" class="form-control" name="title" placeholder="title" required="">
        </div>

        <div class="form-group">
          <label for=""> description</label>
          <input type="numeber" class="form-control" name="description" placeholder="description" required="">
        </div>


        <div class="form-group">
        <label for="image">Select image to upload</label>
        <input type="file" name="image" id="image"  required="">
        </div>



        <div class="form-group">
          <label for=""> address</label>
          <input type="address" class="form-control" name="address" placeholder="address" required="">
        </div>
        <div class="form-group">
          <label for=""> city</label>
          <input type="text" class="form-control" name="city" placeholder="city" required="">
        </div>
        <div class="form-group">
          <label for=""> propery_option</label>
          <select class="form-control"  name="property_option" required="" >
            <option >Select Your property_option</option>
          <option >for_sale</option>
          <option >for_rent</option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit"name="save_data" class="btn btn-primary">Save Data</button>
        
      </div>
      
      <button>Go back <a href="home2.php">back now</a></button>
      <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

   
    if (empty($_POST["title"])) {
        $errors[] = "Title is required.";
    }
    if (empty($_POST["description"])) {
        $errors[] = "Description is required.";
    }
    if (empty($_POST["image"])) {
      $errors[] = "image is required.";
  }


    if (empty($_POST["address"])) {
        $errors[] = "Address is required.";
    }
    if (empty($_POST["city"])) {
        $errors[] = "City is required.";
    }
    if (empty($_POST["property_option"])) {
        $errors[] = "Property option is required.";
    }

    if (empty($errors)) {
        // Process form data here
        echo "Form submitted successfully!";
    } else {
        foreach ($errors as $error) {
            echo "<div style='color: red;'>$error</div>";
        }
    }
}
?>
      </form>