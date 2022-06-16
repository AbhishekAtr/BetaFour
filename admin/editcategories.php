<?php
// Include the database configuration file  
include 'partials/db_connect.php';


// If file upload form is submitted 
$status = false;
$statusMsg = false;
if (isset($_POST['c_update'])) {
    $Id = $_GET['id'];
    $cat_title = $_POST['category'];
    $cat_desc = $_POST['desc'];
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        // $title = $_FILES['title']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];

            $imgContent = addslashes(file_get_contents($image));
            $destinationfile = 'upload/' . $fileName;
            if (move_uploaded_file($image, $destinationfile)) {
                // Insert image content into database
                $sql = "UPDATE `categories` SET  `cat_title` = '$cat_title', `cat_img` = '$destinationfile', `cat_desc` = '$cat_desc' WHERE  `cat_id` = '$Id'";
                $smt = $conn->prepare($sql);
                $smt->execute();
                if ($sql) {
                    $status = true;
                    header("location: categories.php");
                } else {
                    $statusMsg = "File upload failed, please try again.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
        } else {
            $statusMsg = 'Please select an image file to upload.';
        }
    }
}

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
<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * from `categories` where cat_id='$id'");
$row = mysqli_fetch_array($query);
?>
<div class="content-body my-5 height-100 bg-light" id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-right mt-5">
                <a href="categories.php">
                <i class="fa fa-arrow-left text-success"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form class="mt-5" method="post" action="editcategories.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Category Name <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" value="<?php echo $row['cat_title']; ?>" name="category" placeholder="Enter category name">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="cat_desc" class="control-label">Category Description <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" value="<?php echo $row['cat_desc']; ?>" name="desc" placeholder="Enter category name">
                    </div>

                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label>Image (png,jpeg,jpg) (1920x800 in pixel, Max size 1MB)<sup class="mandatory">*</sup> </label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" value="<?php echo $row['cat_img']; ?>" name="image" file-input="packageFile" accept=".jpg, .jpeg, .png">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <label></label>
                    <div class="input-group mt-2">
                        <button type="submit" name="c_update" title="Submit" class="btn btn-warning btn-block">Update Category</button>
                        <!-- <button type="button" title="Cancel" class="btn btn-danger mr-lf-2-per" ng-click="cancel()">Cancel</button> -->
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
<?php include "include/js-url.php"; ?>