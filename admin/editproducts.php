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
    if (!empty($_FILES["p_image"]["name"]) || !empty($_FILES["f_image"]["name"])) {

        // Get file info 
        $fileName = basename($_FILES["p_image"]["name"]);
        $fileName1 = basename($_FILES["f_image"]["name"]);

        // $title = $_FILES['title']['name'];
        $fileType1 = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileType2 = pathinfo($fileName1, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType1, $allowTypes) || in_array($fileType2, $allowTypes)) {
            $image = $_FILES['p_image']['tmp_name'];
            $image1 = $_FILES["f_image"]["tmp_name"];

            $imgContent1 = addslashes(file_get_contents($image));
            $imgContent2 = addslashes(file_get_contents($image1));

            $destinationfile = 'upload/' . $fileName;
            $destinationfile1 = 'upload/' . $fileName1;

            if (move_uploaded_file($image, $destinationfile) || move_uploaded_file($image1, $destinationfile1)) {
                // Update content into database
                $update = "UPDATE `products` SET `product_id`='$id',`product_cat`='$product_cat',`product_title`='$product_title',`product_qty`='$product_qty',`product_desc`='$product_desc',`product_img`='$destinationfile', `other_img`='$destinationfile1' WHERE `product_id`='$id'";
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
<div class="content-body my-5 height-100 bg-light" id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-right mt-5">
                <a href="products.php">
                <i class="fa fa-arrow-left text-success"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <form class="mt-5" method="post" action="editproducts.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <div class="row page-titles mx-0">
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="productname" class="control-label">Product Name <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" name="p_name" placeholder="Enter category name" value="<?php echo $row['product_title']; ?>">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Product qty <sup class="mandatory">*</sup></label>
                        <input type="number" id="quantity" min="1" max="50" class="form-control" name="p_qty" placeholder="Enter quantity" value="<?php echo $row['product_qty']; ?>">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="image" class="control-label">Product Image <sup class="mandatory">*</sup></label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="p_image" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="image" class="control-label">Other Image <sup class="mandatory">*</sup></label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="f_image" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-3 col-sm-6">-->
                <!--    <div class="form-group">-->
                <!--        <label for="image" class="control-label">Back Image <sup class="mandatory">*</sup></label>-->
                <!--        <div class="input-group mb-3">-->
                <!--            <div class="custom-file">-->
                <!--                <input type="file" class="custom-file-input" name="b_image" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif">-->
                <!--                <label class="custom-file-label">Choose file</label>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Category<sup class="mandatory">*</sup> </label>
                        <select class="form-control " name="p_cat">
                            <option selected><?php echo $row['product_cat']; ?></option>
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
                                    <option><?php echo $row['cat_title']; ?></option>
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
                <?php
                $id = $_GET['id'];
                $query = mysqli_query($conn, "SELECT * from `products` where product_id='$id'");
                $row = mysqli_fetch_array($query);
                ?>
                <div class="col-md-12">
                    <textarea id="mytextarea" class="form-control" rows="5" placeholder=" " spellcheck="false" name="p_desc"><?php echo $row['product_desc']; ?> </textarea>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <div class="input-group  mt-4">
                            <button type="submit" name="p_insert" title="Submit" class="btn btn-info btn-block">Upload</button>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-4">
            <img class="wd-40" id="imgPreview" src="<?php echo $row['image_url']; ?>" width="100" height="100">
        </div> -->
            </div>
        </form>
    </div>
</div>

<?php include "include/js-url.php"; ?>