<?php
session_start();
// session_regenerate_id();


?>

<?php
// Include the database configuration file  
include 'partials/db_connect.php';

// If file upload form is submitted 
$showAlert = false;
$showError = false;

if (isset($_POST["c_insert"])) {
    $cat_title = $_POST['category'];
    $cat_desc = $_POST['cat_desc'];
    $showAlert = 'error';
    if (!empty($_FILES["c_image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["c_image"]["name"]);
        // $title = $_FILES['title']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['c_image']['tmp_name'];

            $imgContent = addslashes(file_get_contents($image));
            $destinationfile = 'upload/' . $fileName;
            if (move_uploaded_file($image, $destinationfile)) {
                // Insert image content into database
                $insert = "INSERT INTO `categories`( `cat_title`,`cat_img`, `cat_desc`) VALUES ('$cat_title','$destinationfile', ' $cat_desc')";
                $smt=$conn->prepare($insert);
                $smt->execute();
                if ($insert) {
                    $showAlert = true;
                    header("loaction: categories.php");
                } else {
                    $showError = "File upload failed, please try again.";
                }
            } else {
                $showError= 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
        } else {
            $showError = 'Please select an image file to upload.';
        }
    }
}
?>

<?php 
include "include/css-url.php";
include "partials/sidebar.php";
?>
<?php

if ($showAlert) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hurry !!!!</strong> Your data is insert successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}

if ($showError) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
?>

<div class="content-body my-5" id="main">
    <div class="container">
        <form class=" mt-5" method="post" action="categories.php" enctype="multipart/form-data">
            <div class="row page-titles mx-0">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Category Name <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Enter category name" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="cat_desc" class="control-label">Category Description <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" id="cat_desc" name="cat_desc" placeholder="Enter Description" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Image (png,jpeg,jpg) (1920x800 in pixel, Max size 1MB)<sup class="mandatory">*</sup> </label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="c_image" name="c_image" file-input="packageFile" accept=".jpg, .jpeg, .png" required>
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label></label>
                    <div class="input-group mr-tp-1-per">
                        <button type="submit" name="c_insert" title="Submit" class="btn btn-info">Add Category</button>
                        <!-- <button type="button" title="Cancel" class="btn btn-danger mr-lf-2-per" ng-click="cancel()">Cancel</button> -->
                    </div>
                </div>
               
            </div>
        </form>
    </div>


    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="showmargin" style="float:left;" ng-init="count='10'">
                                    <label>Show </label>
                                    <select class="entries" name="count" ng-model="itemsPerPage">
                                        <option ng-value="10" selected="selected">10</option>
                                        <option ng-value="20">20</option>
                                        <option ng-value="50">50</option>
                                        <option ng-value="70">70</option>
                                        <option ng-value="100">100</option>
                                    </select>
                                    <label for="">Entries</label>
                                </div>
                            </div>
                            <div class="col-lg-3 offset-6">
                                <div class="form-group">
                                    <input type="search" class="form-control" placeholder="search..." ng-model="filterPro">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table  table-hover">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    include 'partials/db_connect.php';
                                    $sql = "SELECT * from `categories`";
                                    if (mysqli_query($conn, $sql)) {
                                        echo "";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
                                    $count = 1;
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) { ?>

                                            <tr>
                                                <td><?php echo $row['cat_id']; ?></td>

                                                <td><?php echo $row['cat_title']; ?></td>
                                                <td><?php echo $row['cat_img']; ?></td>
                                                <td><?php echo $row['cat_desc']; ?></td>
                                                <td>
                                                    <a href='editcategories.php?id=<?php echo $row['cat_id'] ?>' type="button" class="btn btn-primary mr-1"><i class="fa fa-edit"></i>
                                                    <a href='#' class="btn btn-danger deletebtn" type="button"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                    <?php
                                            $count++;
                                        }
                                    } else {
                                        echo '0 results';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div style="margin: 10px;">
                            <dir-pagination-controls class="pull-right pagination" max-size="8" direction-links="true" boundary-links="true"></dir-pagination-controls>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "include/js-url.php"; ?>

<?php include "include/deletemodal.php"; ?>


