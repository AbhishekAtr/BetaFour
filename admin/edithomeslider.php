<?php
// Include the database configuration file  
include 'partials/db_connect.php';

// If file upload form is submitted 
$status = false;
$statusMsg = false;

if (isset($_POST['update'])) {
    $id = $_GET['id'];

    $title = $_POST['title'];
    $status = 'error';
    if (!empty($_FILES["e_image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["e_image"]["name"]);
        // $title = $_FILES['title']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['e_image']['tmp_name'];

            $imgContent = addslashes(file_get_contents($image));
            $destinationfile = 'upload/' . $fileName;
            if (move_uploaded_file($image, $destinationfile)) {
                // Update image content into database
                $query = "UPDATE `home-slider` SET `Id`='$id', `image_url`='$destinationfile', `slider_title`= '$title' WHERE Id='$id'";
                $smt = $conn->prepare($query);
                $smt->execute();
                if ($query) {
                    $status = true;
                    header('location: home-slider.php');
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



<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * from `home-slider` where Id='$id'");
$row = mysqli_fetch_array($query);
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
<div class="content-body my-5 height-100 bg-light" id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-right mt-5">
                <a href="home-slider.php">
                <i class="fa fa-arrow-left text-success"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form class="mt-4" method="post" action="edithomeslider.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-5 col-sm-6">
                            <div class="form-group">
                                <label>Image (png,jpeg,jpg) (1920x800 in pixel, Max size 1MB)<sup class="mandatory">*</sup> </label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="e_image" name="e_image" file-input="packageFile" accept=".jpg, .jpeg, .png">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6">
                            <label for="input-rounded" class="control-label">Title<sup class="mandatory">*</sup> </label>
                            <div class="input-group mb-3">
                                <input type="title" class="form-control" value="<?php echo $row['slider_title']; ?>" name="title" id="title" placeholder="Title" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" />
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-6">
                            <label></label>
                            <div class="input-group mb-3 mt-2">
                                <button type="submit" name="update" title="Submit" class="btn btn-warning btn-block mb-4">Update</button>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "include/js-url.php"; ?>