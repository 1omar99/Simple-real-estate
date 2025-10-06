<?php 
session_start();
include 'header.php' 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Home Rentals</b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Rentals</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Add Rental Modal -->
<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Rentals</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="connection6.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">rental_id</label>
                        <input type="text" class="form-control" name="rental_id" placeholder="rental_id" >
                    </div>
                    <div class="form-group">
                        <label for="">customer_id</label>
                        <input type="text" class="form-control" name="customer_id" placeholder="customer_id" required="">
                    </div>
                    <div class="form-group">
                        <label for="">rental_date</label>
                        <input type="text" class="form-control" name="rental_date" placeholder="rental_date" required="">
                    </div>
                    <div class="form-group">
                        <label for="">return_date</label>
                        <input type="text" class="form-control" name="return_rental" placeholder="return_rental" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="save_data" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Rental Modal -->
<div class="modal fade" id="updateuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Update Rental</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="connection6.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="update_id" id="update_id">
                    <div class="form-group">
                        <label for="">rental_id</label>
                        <input type="text" class="form-control" id="update_rental_id" name="rental_id" placeholder="rental_id" required="">
                    </div>
                    <div class="form-group">
                        <label for="">customer_id</label>
                        <input type="text" class="form-control" id="update_customer_id" name="customer_id" placeholder="customer_id" required="">
                    </div>
                    <div class="form-group">
                        <label for="">rental_date</label>
                        <input type="text" class="form-control" id="update_rental_date" name="rental_date" placeholder="rental_date" required="">
                    </div>
                    <div class="form-group">
                        <label for="">return_date</label>
                        <input type="text" class="form-control" id="update_return_rental" name="return_rental" placeholder="return_rental" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update_data" class="btn btn-primary">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container ml-3">
    <div class="row">
        <div class="col-mt-1">
            <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] !='') {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>hey!</strong> <?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                unset($_SESSION['status']);
            }
            ?>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
                        Add rental
                    </button>
                    <button type="button">
                        <a href="rental_report.php">report home rental</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered mt-4">
        <thead>
            <tr>
                <th scope="col">rental_id</th>
                <th scope="col">customer_id</th>
                <th scope="col">rental_date</th>
                <th scope="col">return_date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $depcode = mysqli_connect("localhost", "root", "12345", "ictd");
            $fetch_query = "SELECT * FROM rentals";
            $fetch_query_run = mysqli_query($depcode, $fetch_query);

            if(mysqli_num_rows($fetch_query_run) > 0) {
                while($row = mysqli_fetch_array($fetch_query_run)) {
            ?>
            <tr>
                <td class="rental_id"><?php echo $row['rental_id']; ?></td>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo $row['rental_date']; ?></td>
                <td><?php echo $row['return_date']; ?></td>
                <td>
                    <a href="#" class="btn btn-info btn-sm update_data">Update</a>
                    <a href="#" class="btn btn-danger btn-sm delete_data">Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
            ?>
            <tr colspan="4">No Record Found</tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php' ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Delete data
    $('.delete_data').click(function(e) {
        e.preventDefault();
        var id = $(this).closest('tr').find('.rental_id').text();

        $.ajax({
            method: "POST",
            url: "connection6.php",
            data: {
                'click_delete_btn': true,
                'id': id
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    // Update data
    $('.update_data').click(function(e) {
        e.preventDefault();
        var row = $(this).closest('tr');
        var id = row.find('.rental_id').text();
        var customer_id = row.find('td:eq(1)').text();
        var rental_date = row.find('td:eq(2)').text();
        var return_date = row.find('td:eq(3)').text();

        $('#update_id').val(id);
        $('#update_rental_id').val(id);
        $('#update_customer_id').val(customer_id);
        $('#update_rental_date').val(rental_date);
        $('#update_return_rental').val(return_date);

        $('#updateuser').modal('show');
    });
});
</script>
