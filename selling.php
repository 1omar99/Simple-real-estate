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
                    <h1 class="m-0"><b>Selling Form</b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Selling form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Add Rental Modal -->
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Selling</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="connection7.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Property ID</label>
                            <input type="text" class="form-control" name="property_id" placeholder="Property ID" >
                        </div>
                        <div class="form-group">
                            <label for="">Customer ID</label>
                            <input type="text" class="form-control" name="customer_id" placeholder="Customer ID" required>
                        </div>
                        <div class="form-group">
                            <label for="">Listing Date</label>
                            <input type="text" class="form-control" name="listing_date" placeholder="Listing Date" required>
                        </div>
                        <div class="form-group">
                            <label for="">Selling Price</label>
                            <input type="text" class="form-control" name="selling_price" placeholder="Selling Price" required>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Update Selling</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="connection7.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="update_id" name="update_id">
                        <div class="form-group">
                            <label for="">Property ID</label>
                            <input type="text" class="form-control" id="update_property_id" name="property_id" required>
                        </div>
                        <div class="form-group">
                            <label for="">Customer ID</label>
                            <input type="text" class="form-control" id="update_customer_id" name="customer_id" required>
                        </div>
                        <div class="form-group">
                            <label for="">Listing Date</label>
                            <input type="text" class="form-control" id="update_listing_date" name="listing_date">
                        </div>
                        <div class="form-group">
                            <label for="">Selling Price</label>
                            <input type="text" class="form-control" id="update_selling_price" name="selling_price" required>
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
                if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
                            Add Selling Property
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="selling_report.php" class="text-white text-decoration-none">Selling Property Report</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col">Property ID</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Listing Date</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $depcode = mysqli_connect("localhost", "root", "12345", "ictd");
                $fetch_query = "SELECT * FROM selling";
                $fetch_query_run = mysqli_query($depcode, $fetch_query);

                if(mysqli_num_rows($fetch_query_run) > 0)
                {
                    while($row = mysqli_fetch_array($fetch_query_run))
                    {
                        ?>
                        <tr>
                            <td class="property_id"><?php echo $row['property_id']; ?></td>
                            <td><?php echo $row['owner_id']; ?></td>
                            <td><?php echo $row['listing_date']; ?></td>
                            <td><?php echo $row['sale_price']; ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm update_data">Update</a>
                                <a href="#" class="btn btn-danger btn-sm delete_data">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <tr>
                        <td colspan="5">No Record Found</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include 'footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.delete_data').click(function (e) {
                e.preventDefault();
                var property_id = $(this).closest('tr').find('.property_id').text();
                $.ajax({
                    method: "POST",
                    url: "connection7.php",
                    data: {
                        'click_delete_btn': true,
                        'property_id': property_id,
                    },
                    success: function (response) {
                        console.log(response);
                        window.location.reload();
                    }
                });
            });

            $('.update_data').click(function(e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var property_id = row.find('.property_id').text();
                var customer_id = row.find('td:eq(1)').text();
                var listing_date = row.find('td:eq(2)').text();
                var selling_price = row.find('td:eq(3)').text();

                $('#update_id').val(property_id);
                $('#update_property_id').val(property_id);
                $('#update_customer_id').val(customer_id);
                $('#update_listing_date').val(listing_date);
                $('#update_selling_price').val(selling_price);

                $('#updateuser').modal('show');
            });
        });
    </script>
</div>
