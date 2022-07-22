<?php
// Include the database configuration file  
include 'include/db_connect.php';

// If file upload form is submitted 
$status = false;
$statusMsg = false;

if (isset($_POST["n_insert"])) {
    $id = $_GET['id'];
    $product_title = $_POST['n_name'];
    $product_cat = $_POST['n_cat'];
    $product_qty = $_POST['n_qty'];
    $product_desc = $_POST['n_desc'];
    $status = 'error';
    if (!empty($_FILES["n_image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["n_image"]["name"]);
        // $title = $_FILES['title']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['n_image']['tmp_name'];

            $imgContent = addslashes(file_get_contents($image));
            $destinationfile = 'upload/' . $fileName;
            if (move_uploaded_file($image, $destinationfile)) {
                // Insert image content into database
                $update = "UPDATE `new-release` SET `id`='$id',`image`='$destinationfile',`title`='$product_title',`description`='$product_desc',`qty`='$product_qty',`category`='$product_cat' WHERE `id`='$id'";
                $smt = $conn->prepare($update);
                $smt->execute();
                if ($update) {
                    $status = true;
                    header("location: new-release.php");
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
<div class="main-section" id="main">
    <div class="container">
        <div class="adminForm card m-3 p-5">
            <div class="row">
                <div class="col-md-12 text-right mt-5">
                    <a href="new-release.php">
                        <i class="fa fa-arrow-left text-primary"></i>
                    </a>
                </div>
            </div>
            <?php
            $id = $_GET['id'];
            $query = mysqli_query($conn, "SELECT * from `new-release` where `id`='$id'");
            $row = mysqli_fetch_array($query);
            ?>
            <form class="mt-5" method="post" action="editnewrelease.php?id=<?php echo $id; ?>" enctype="multipart/form-data">

                <div class="row page-titles mx-0">
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="productname" class="control-label">Product Name <sup class="text-danger bold">*</sup></label>
                            <input type="text" class="form-control" id="n_name" name="n_name" placeholder="Enter category name" value="<?php echo $row['title']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="image" class="control-label">Product Image <sup class="text-danger bold">*</sup></label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="n_image" name="n_image" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="image" class="control-label">Other Image <sup class="text-danger bold">*</sup></label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="f_image" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="category" class="control-label">Category<sup class="text-danger bold">*</sup> </label>
                            <select class="form-select" name="n_cat" id="n_cat" required>
                                <option selected><?php echo $row['category']; ?></option>
                                <?php
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


                                        <option value="<?php echo $row['cat_title']; ?>"><?php echo $row['cat_title']; ?> </option>
                                <?php
                                        $count++;
                                    }
                                } else {
                                    echo '0 results';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 mt-4">
                        <?php
                        $id = $_GET['id'];
                        $query = mysqli_query($conn, "SELECT * from `new-release` where id='$id'");
                        $row = mysqli_fetch_array($query);
                        ?>
                        <div class="form-group">
                            <textarea id="editor" name="n_desc"><?php echo $row['description']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-1 mt-3">
                        <button type="submit" name="n_insert" title="Submit" class="btn btn-success btn-block">Upload</button>
                    </div>
                    <div class="col-lg-1 mt-3">
                        <a href="new-release.php" type="button" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'include/footer.php';
include 'include/js-url.php'; ?>