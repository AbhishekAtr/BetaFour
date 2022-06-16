<?php
// Include the database configuration file  
include 'partials/db_connect.php';

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
                <a href="new-release.php">
                <i class="fa fa-arrow-left text-primary"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <?php
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * from `new-release` where `id`='$id'");
        $row = mysqli_fetch_array($query);
        ?>
        <form class="mt-5" method="post" action="editnewrelease.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <div class="row page-titles mx-0">
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="productname" class="control-label">Product Name <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" name="n_name" placeholder="Enter category name" value="<?php echo $row['title']; ?>">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Product qty <sup class="mandatory">*</sup></label>
                        <input type="number" id="quantity" name="quantity" min="1" max="50" class="form-control" name="n_qty" placeholder="Enter quantity" value="<?php echo $row['qty']; ?>">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="image" class="control-label">Product Image <sup class="mandatory">*</sup></label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="n_image" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Category<sup class="mandatory">*</sup> </label>
                        <select class="form-control " name="n_cat">
                            <option selected>Select Category</option>
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
                <div class="col-md-12 col-sm-6">
                    <textarea id="mytextarea" class="form-control" rows="5" placeholder="description" value="<?php echo $row['description']; ?>" spellcheck="false" name="n_desc"> </textarea>
                </div>
                <div class="col-md-12 col-sm-6">
                    <div class="form-group">
                        <div class="input-group mt-4">
                            <button type="submit" name="n_insert" title="Submit" class="btn btn-success btn-block">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include "include/js-url.php"; ?>