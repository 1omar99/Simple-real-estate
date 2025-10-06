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
                    <h1 class="m-0"><b>Client Properties</b></h1>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Add Property Modal -->
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Properties List</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="connection11.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="client_id">Client ID</label>
                            <input type="text" class="form-control" name="client_id" placeholder="Property ID" required>
                        </div>
                        <div class="form-group">
                            <label for="title">PropertyID</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" required>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Update Client Property</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="connection11.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="update_id" name="update_id">
                        <div class="form-group">
                            <label for="update_property_id">Client ID</label>
                            <input type="text" class="form-control" id="update_property_id" name="property_id" required>
                        </div>
                        <div class="form-group">
                            <label for="update_title">Property ID</label>
                            <input type="text" class="form-control" id="update_title" name="title" required>
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
                if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
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
                        <button type="button" class="btn btn-primary">
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
                <th scope="col">Client ID</th>
                <th scope="col">Property ID</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $empcode = mysqli_connect("localhost", "root", "12345", "ictd");
            $fetch_query = "SELECT * FROM clientproperty";
            $fetch_query_run = mysqli_query($empcode, $fetch_query);

            if(mysqli_num_rows($fetch_query_run) > 0) {
                while($row = mysqli_fetch_array($fetch_query_run)) {
                    ?>
                    <tr>
                        <td class="property_id"><?php echo $row['ClientID']; ?></td>
                        <td><?php echo $row['Property_ID']; ?></td>
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
                    <td colspan="3">No Record Found</td>
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
            url: "connection11.php",
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

        $('#update_id').val(property_id);
        $('#update_property_id').val(property_id);
        $('#update_title').val(title);

        $('#updateuser').modal('show');
    });
});
</script>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
