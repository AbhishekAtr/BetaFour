<?php
// Include the database configuration file  
include 'include/db_connect.php';

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



<?php include 'include/css-url.php';
include 'include/header.php'; ?>
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
<section class="main-section" id="main">
    <div class="container">
        <div class="adminForm card m-3 p-5">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="home-slider.php">
                        <i class="fa fa-arrow-left text-success"></i>
                    </a>
                </div>
            </div>
            <form class="mt-4" method="post" action="edithomeslider.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="e_image" name="e_image" file-input="packageFile" accept=".jpg, .jpeg, .png" required>
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="Title" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $row['slider_title']; ?>" required>
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" name="update" title="Submit" class="btn btn-success btn-block">Update</button>
                    </div>
                    <div class="col-lg-1">
                        <a href="home-slider.php" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include 'include/footer.php';
include 'include/js-url.php'; ?>