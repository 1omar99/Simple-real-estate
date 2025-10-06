<?php 
session_start();
include 'header.php' ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <b> Users List</b>  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 

<!-- Modal -->
<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>User Creation </b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="connection2.php" method="POST">
      <div class="modal-body">
      
      <div class="form-group">
          <label for=""> id</label>
          <input type="text" class="form-control" name="id" placeholder="E Y id">
        </div>



        <div class="form-group">
          <label for=""> Fullname</label>
          <input type="text" class="form-control" name="name" placeholder="E Y Fullname">
        </div>

        <div class="form-group">
          <label for=""> Email</label>
          <input type="email" class="form-control" name="email" placeholder="E Y Email">
        </div>

        <div class="form-group">
          <label for=""> Password</label>
          <input type="password" class="form-control" name="password" placeholder="E Y Passsword">
        </div>

        <div class="form-group">
          <label for=""> Confirm_password</label>
          <input type="password" class="form-control" name="cpassword" placeholder="E Y Password">
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit"name="save_data" class="btn btn-primary">Save Data</button>
      </div>
      </form>
    </div>
  </div>
</div>


    <div class="container ml-3">
  
      <div class="row">
      <div class="col-mt-1">
           
      <?php

      if(isset($_SESSION['status']) && $_SESSION['status'] !='')
      {
        
        ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>hey !</strong> <?php echo $_SESSION['status'];  ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

        <?php
        unset($_SESSION['status']);
      }

      ?>



        <div class="card">
          <div class="card-body">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
  Add User
</button>
          </div>
        </div>
      </div>
      </div>
       
    </div>
<table class="table table-striped table-bordered  mt-4">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">fullname</th>
      <th scope="col">email</th>
      <th scope="col">Password</th>
      <th scope="col">Confirm_password</th>
      <th scope="col"> Action</th>
   
    </tr>
  </thead>
  <tbody>
      <?php
          
             $usercode = mysqli_connect("localhost", "root", "12345", "ictd");
            $fetch_query = "SELECT * FROM users";
            $fetch_query_run = mysqli_query($usercode, $fetch_query);

            if(mysqli_num_rows($fetch_query_run) > 0)

            {
                   while($row = mysqli_fetch_array($fetch_query_run))
                   {
                    // echo $row ['id'];

                    ?>
                   <tr>
                         <td class="user_id"><?php echo $row ['id']; ?></td>
                         <td><?php echo $row ['name']; ?></td>
                         <td><?php echo $row ['email']; ?></td>
                         <td><?php echo $row ['password']; ?></td>
                         <td><?php echo $row ['cpassword']; ?></td>
                         
                         
                         <td>

                           <a href="#" class="btn btn-info btn-sm update_data"> Update</a>
                          <a href="#" class="btn btn-danger btn-sm  delete_data"> Delete</a>

                         </td>
                         
                        
                 </tr>
                    <?php

                   }
                
            }

             else{
                  
                   ?>
                      
                      <tr colspan="4"> No Record Found</tr>

                   <?php

             }

      ?>

   
   
  </tbody>
</table>






<?php  include 'footer.php' ?>
<script>





// delete data

$(document).ready(function (){

  $('.delete_data').click(function (e) {

 e.preventDefault();



var id = $(this).closest('tr').find('.user_id').text();



    $.ajax({
      method: "POST",
      url: "connection2.php",
      data: {
            
        'click_delete_btn': true,
        'id':id,

      },
     

     success: function (response) {

      console.log(response)
      window.location.reload();


     }
  
    });


  });

});







  </script>