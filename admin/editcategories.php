<?php
// Include the database configuration file  
include 'partials/db_connect.php';

// If file upload form is submitted 
$status = false;
$statusMsg = false;
if (isset($_POST['c_update'])) {
    $Id = $_GET['id'];
    $title =  $_POST['category'];
    $update = "UPDATE `categories` SET `cat_id`='$Id', `cat_title`='$title' WHERE cat_id='$Id'";
    $query = mysqli_query($conn, $update);
    header("location: categories.php");
}

?>

<?php 
$Id=$_GET['id'];
$query=mysqli_query($conn,"SELECT * from `categories` where cat_id='$Id'");
$row=mysqli_fetch_array($query);
?>


<?php include "include/css-url.php"; ?>
<?php include "partials/sidebar.php"; ?>
<?php

if ($status) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hurry !!!!</strong> Your Image uploaded successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}

if ($statusMsg) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> ' . $statusMsg . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
?>

<div class="container">
        <form class=" mt-5" method="post" action="editcategories.php?id=<?php echo $Id; ?>">
            <div class="row page-titles mx-0">
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Category Name <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" value="<?php echo $row['cat_title']; ?>"  name="category" placeholder="Enter category name" required>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label></label>
                    <div class="input-group mr-tp-1-per">
                        <button type="submit" name="c_update" title="Submit" class="btn btn-info">Update Category</button>
                        <!-- <button type="button" title="Cancel" class="btn btn-danger mr-lf-2-per" ng-click="cancel()">Cancel</button> -->
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <img class="wd-40" id="imgPreview" src="<?php echo $row['image_url']; ?>" width="100" height="100">
                </div> -->
            </div>
        </form>
    </div>

<?php include "include/js-url.php"; ?>