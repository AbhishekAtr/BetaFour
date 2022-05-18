<?php
// Include the database configuration file  
require_once 'partials/db_connect.php';

// If file upload form is submitted 
$status = false;
$statusMsg = false;

if (isset($_POST["p_insert"])) {
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
            move_uploaded_file($image, $destinationfile);
            // Insert image content into database
            $insert = "INSERT INTO `products`( `product_cat`, `product_title`, `product_qty`, `product_desc`, `product_img`) VALUES ('$product_cat','$product_title','$product_qty','$product_desc','$destinationfile')";
            if ($insert) {
                $status = true;
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
?>


<?php include "include/css-url.php"; ?>
<?php include "partials/header.php"; ?>
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

<div class="content-body">
    <div class="container">

        <form class="ml-10 mt-5" method="post" action="products.php" enctype="multipart/form-data">
            <div class="row page-titles mx-0">
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="productname" class="control-label">Product Name <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Enter category name">
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="description" class="control-label">Product Description <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" id="p_desc" name="p_desc" placeholder="Enter category name">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Product qty <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" id="p_qty" name="p_qty" placeholder="Enter category name">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="image" class="control-label">Product Image <sup class="mandatory">*</sup></label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="p_image" name="p_image" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Category<sup class="mandatory">*</sup> </label>
                        <select class="form-control " name="p_cat" id="p_cat">
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


                                    <option value="1"><?php echo $row['cat_title']; ?> </option>
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
                            <button type="submit" name="p_insert" title="Submit" class="btn btn-info">Upload</button>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-4">
                    <img class="wd-40" id="imgPreview" src="<?php echo $row['image_url']; ?>" width="100" height="100">
                </div> -->
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ml-10">
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
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                        <th class="wd-10">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    include 'partials/db_connect.php';
                                    $sql = "SELECT * from `products`";
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
                                                <td><?php echo $row['product_id']; ?></td>
                                                <td>
                                                    <img class="wd-120" src="<?php echo $row['product_img']; ?>" alt="" height="100" width="100">
                                                </td>
                                                <td><?php echo $row['product_title']; ?></td>
                                                <td><?php echo $row['product_qty']; ?></td>
                                                <td><?php echo $row['product_cat']; ?></td>
                                                <td>
                                                    <a href='home-slider.php?pid=<?php echo $row['product_id']; ?>' data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mr-1"><i class="fa fa-edit"></i>
                                                        <a href='home-slider.php?pid=<?php echo $row['product_id']; ?>' class="btn btn-danger" ng-click="deleteModal(item)"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                            <?php
                                            $count++;
                                        }
                                    } else {
                                        echo '0 results';
                                    }
                                            ?>
                                                </td>
                                            </tr>
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