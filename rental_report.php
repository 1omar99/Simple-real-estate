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
            <h1 class="m-0"> <b> Home rental report</b>  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Home rental report</li>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Rental_Report<b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
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



        
      </div>
      </div>
    </div>
    <table class="table table-striped table-bordered  mt-4">
  <thead>
    <tr>
      <th scope="col">rental_id</th>
      <th scope="col">customer_id</th>
      <th scope="col">rental_date</th>
      <th scope="col">return_date</th>
      
      
    </tr>
    <button onclick="window.print()" class="btn btn-primary" style="float: right;"> Print</button>
  </thead>
  <tbody>
      <?php
          
             $empcode = mysqli_connect("localhost", "root", "12345", "ictd");
            $fetch_query = "SELECT * FROM rentals";
            $fetch_query_run = mysqli_query($empcode, $fetch_query);

            if(mysqli_num_rows($fetch_query_run) > 0)

            {
                   while($row = mysqli_fetch_array($fetch_query_run))
                   {

                    ?>
                   <tr>
      
                         <td class="emp_id"><?php echo $row ['rental_id']; ?></td>
                         <td><?php echo $row ['customer_id']; ?></td>
                         <td><?php echo $row ['rental_date']; ?></td>
                         <td><?php echo $row ['return_date']; ?></td>
                         
                         
                         
                        
                         
                        
                 </tr>
                 
                    <?php

                   }
                
            }

             else{
                  
                   ?>
                      
                      <tr colspan="6"> No Record Found</tr>

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



var rental_id = $(this).closest('tr').find('.rental_id').text();

//  console.log(id);

    $.ajax({
      method: "POST",
      url: "connection6.php",
      data: {
            
        'click_delete_btn':true,
        'property_id':rental_id ,

      },
     

     success: function (response) {

      console.log(response)
      window.location.reload();


     }
  
    });


  });

});





</script>