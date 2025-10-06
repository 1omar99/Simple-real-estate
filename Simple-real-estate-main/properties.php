<?php 
session_start();
include 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Properties</b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Properties</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Add Property Modal -->
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Properties List</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="connection5.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Property ID</label>
                            <input type="text" class="form-control" name="property_id" placeholder="Property ID" >
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Description" required>
                        </div>

                        <div class="form-group">
        <label for="image">Select image to upload</label>
        <input type="file" name="image" id="image"  required="">
        </div>




                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Address" required>
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="city" placeholder="City" required>
                        </div>
                        <div class="form-group">
                            <label for="">Property Option</label>
                            <select class="form-control" name="property_option" required>
                                <option>Select Your Option</option>
                                <option>For Sale</option>
                                <option>For Rent</option>
                            </select>
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

    <!-- Update Property Modal -->
    <div class="modal fade" id="updateuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Update Property</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="connection5.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="update_id" name="update_id">
                        <div class="form-group">
                            <label for="">Property ID</label>
                            <input type="text" class="form-control" id="update_property_id" name="property_id" required>
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="update_title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" id="update_description" name="description" required>
                        </div>
                          
                        <div class="form-group">
        <label for="image">Select image to upload</label>
        <input type="file" name="image" id="image"  required="">
        </div>


                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" id="update_address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" class="form-control" id="update_city" name="city" required>
                        </div>
                        <div class="form-group">
                            <label for="">Property Option</label>
                            <select class="form-control" id="update_property_option" name="property_option" required>
                                <option>Select Your Option</option>
                                <option>For Sale</option>
                                <option>For Rent</option>
                            </select>
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
                            Add Property
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
                            <a href="property_report.php" class="text-white text-decoration-none">Report Property</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered mt-4">
        <thead>
            <tr>
                <th scope="col">Property ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">image</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Property Option</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $empcode = mysqli_connect("localhost", "root", "12345", "ictd");
            $fetch_query = "SELECT * FROM properties";
            $fetch_query_run = mysqli_query($empcode, $fetch_query);

            if(mysqli_num_rows($fetch_query_run) > 0) {
                while($row = mysqli_fetch_array($fetch_query_run)) {
                    ?>
                    <tr>
                        <td class="property_id"><?php echo $row['property_id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row ['image']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['property_option']; ?></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm update_data">Update</a>
                            <a href="#" class="btn btn-danger btn-sm delete_data">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="7">No Record Found</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

<script>
$(document).ready(function() {
    // Delete data
    $('.delete_data').click(function(e) {
        e.preventDefault();
        var property_id = $(this).closest('tr').find('.property_id').text();
        $.ajax({
            method: "POST",
            url: "connection5.php",
            data: {
                'click_delete_btn': true,
                'property_id': property_id
            },
            success: function(response) {
                console.log(response);
                window.location.reload();
            }
        });
    });

    // Update data
    $('.update_data').click(function(e) {
        e.preventDefault();
        var row = $(this).closest('tr');
        var property_id = row.find('.property_id').text();
        var title = row.find('td:eq(1)').text();
        var description = row.find('td:eq(2)').text();
        var address = row.find('td:eq(3)').text();
        var city = row.find('td:eq(4)').text();
        var property_option = row.find('td:eq(5)').text();

        $('#update_id').val(property_id);
        $('#update_property_id').val(property_id);
        $('#update_title').val(title);
        $('#update_description').val(description);
        $('#update_address').val(address);
        $('#update_city').val(city);
        $('#update_property_option').val(property_option);

        $('#updateuser').modal('show');
    });
});
</script>
