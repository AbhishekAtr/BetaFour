<?php
// Include the database configuration file  
include 'partials/db_connect.php';

// If file upload form is submitted 
$status = false;
$statusMsg = false;

if (isset($_POST["p_insert"])) {
    $id = $_GET['id'];
    $product_title = $_POST['p_name'];
    $product_cat = $_POST['p_cat'];
    $product_qty = $_POST['p_qty'];
    $product_desc = $_POST['p_desc'];
    $status = 'error';
    if (!empty($_FILES["p_image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["p_image"]["name"]);
        // $title = $_FILES['title']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['p_image']['tmp_name'];

            $imgContent = addslashes(file_get_contents($image));
            $destinationfile = 'upload/' . $fileName;
            if (move_uploaded_file($image, $destinationfile)) {
                // Insert image content into database
                $update = "UPDATE `products` SET `product_id`='$id',`product_cat`='$product_cat',`product_title`='$product_title',`product_qty`='$product_qty',`product_desc`='$product_desc',`product_img`='$destinationfile' WHERE `product_id`='$id'";
                $smt = $conn->prepare($update);
                $smt->execute();
                if ($update) {
                    $status = true;
                    header("location: products.php");
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
$query = mysqli_query($conn, "SELECT * from `products` where product_id='$id'");
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

<div class="container">

    <form class="mt-5" method="post" action="editproducts.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <div class="row page-titles mx-0">
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <label for="productname" class="control-label">Product Name <sup class="mandatory">*</sup></label>
                    <input type="text" class="form-control" value="<?php echo $row['product_title']; ?>" name="p_name" placeholder="Enter category name" required>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <label for="description" class="control-label">Product Description <sup class="mandatory">*</sup></label>
                    <input type="text" class="form-control" value="<?php echo $row['product_desc']; ?>" name="p_desc" placeholder="Enter category name" required>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <label for="category" class="control-label">Product qty <sup class="mandatory">*</sup></label>
                    <input type="text" class="form-control" value="<?php echo $row['product_qty']; ?>" name="p_qty" placeholder="Enter category name" required>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <label for="image" class="control-label">Product Image <sup class="mandatory">*</sup></label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="p_image" value="<?php echo $row['product_img']; ?>" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif" required>
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="form-group">
                    <label for="category" class="control-label">Category<sup class="mandatory">*</sup> </label>
                    <select class="form-control " name="p_cat" value="<?php echo $row['product_cat']; ?>" required>
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
            <div class="col-md-3 mt-2">
                <div class="form-group">
                    <div class="input-group  mt-4">
                        <button type="submit" name="p_insert" title="Submit" class="btn btn-info">Update Products</button>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-4">
            <img class="wd-40" id="imgPreview" src="<?php echo $row['image_url']; ?>" width="100" height="100">
        </div> -->
        </div>
    </form>
</div>


<?php include "include/js-url.php"; ?>