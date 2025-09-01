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
            <h1 class="m-0"> <b> Properties report</b>  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              <li class="breadcrumb-item active">Properties report</li>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>properties_list<b></h1>
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
      <th scope="col">property_id</th>
      <th scope="col">title</th>
      <th scope="col">describtion</th>
      <th scope="col">image</th>
      <th scope="col">address</th>
      <th scope="col">city</th>
      <th scope="col">propery_option</th>
      
    </tr>
    <button onclick="window.print()" class="btn btn-primary" style="float: right;"> Print</button>

  </thead>
  <tbody>
      <?php
          
             $empcode = mysqli_connect("localhost", "root", "12345", "ictd");
            $fetch_query = "SELECT * FROM properties";
            $fetch_query_run = mysqli_query($empcode, $fetch_query);

            if(mysqli_num_rows($fetch_query_run) > 0)

            {
                   while($row = mysqli_fetch_array($fetch_query_run))
                   {

                    ?>
                   <tr>
      
                         <td class="emp_id"><?php echo $row ['property_id']; ?></td>
                         <td><?php echo $row ['title']; ?></td>
                         <td><?php echo $row ['description']; ?></td>
                         <td><?php echo $row ['image']; ?></td>
                         <td><?php echo $row ['address']; ?></td>
                         <td><?php echo $row ['city']; ?></td>
                         <td><?php echo $row ['property_option']; ?></td>
                         
                         
                        
                         
                        
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



var property_id = $(this).closest('tr').find('.propperty_id').text();

//  console.log(id);

    $.ajax({
      method: "POST",
      url: "connection5.php",
      data: {
            
        'click_delete_btn':true,
        'property_id':property_id ,

      },
     

     success: function (response) {

      console.log(response)
      window.location.reload();


     }
  
    });


  });

});





</script>