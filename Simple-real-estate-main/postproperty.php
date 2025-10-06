<?php 
session_start();
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posted Properties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Posted Properties</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Properties</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Property Modal -->
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Properties Posted<b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="connection9.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Description" required="">
                        </div>
                        <div class="form-group">
                            <label for="image">Select Image to Upload</label>
                            <input type="file" name="image" id="image" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Address" required="">
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="city" placeholder="City" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Property Option</label>
                            <select class="form-control" name="property_option" required="">
                                <option>Select Your Property Option</option>
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

    <div class="container ml-3">
        <div class="row">
            <div class="col-mt-1">
                <?php
                if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status'];  ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
                        <a href="posted-report.php">Report postproperty</a> 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered mt-4">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Property Option</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $empcode = mysqli_connect("localhost", "root", "12345", "ictd");
        $fetch_query = "SELECT * FROM postproperty";
        $fetch_query_run = mysqli_query($empcode, $fetch_query);

        if(mysqli_num_rows($fetch_query_run) > 0)
        {
            while($row = mysqli_fetch_array($fetch_query_run))
            {
                ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['property_option']; ?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm update_data" data-title="<?php echo $row['title']; ?>">Approve</a>
                        
                    </td>
                </tr>
                <?php
            }
        }
        else
        {
            ?>
            <tr>
                <td colspan="7">No Record Found</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <?php include 'footer.php'; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7ie1Xt4Ff0QZ8PpuK1RR5m3IF0y0G8TxRFw" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
$(document).ready(function () {
    $('.update_data').click(function (e) {
        e.preventDefault();

        var title = $(this).data('title');

        $.ajax({
            method: "POST",
            url: "approve_property.php",
            data: {
                'approve_property_btn': true,
                'title': title,
            },
            success: function (response) {
                console.log(response);
                window.location.reload();
            }
        });
    });

    $('.delete_data').click(function (e) {
        e.preventDefault();

        var title = $(this).data('title');

        $.ajax({
            method: "POST",
            url: "connection9.php",
            data: {
                'click_delete_btn': true,
                'title': title,
            },
            success: function (response) {
                console.log(response);
                window.location.reload();
            }
        });
    });
});
</script>
</body>
</html>
