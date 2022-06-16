<?php
//Include the database configuration file  
include 'partials/db_connect.php';

// If file upload form is submitted 
$status = false;
$statusMsg = false;

if (isset($_POST["p_insert"])) {
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
                // Insert image content into database
                $insert = "INSERT INTO `products`( `product_cat`, `product_title`, `product_qty`, `product_desc`, `product_img`, `other_img`) VALUES ('$product_cat','$product_title','$product_qty','$product_desc','$destinationfile', '$destinationfile1')";
                $smt = $conn->prepare($insert);
                $smt->execute();
                if ($insert) {
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
if (isset($_POST['delete_btn_set'])) {
    $id = $_POST['delete_id'];
    $delete = mysqli_query($conn, $query = "DELETE FROM `products` WHERE product_id='$id'");
    $query = mysqli_query($conn, $delete);
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

        <form class="mt-5" method="post" action="products.php" enctype="multipart/form-data">
            <div class="row page-titles mx-0">
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="productname" class="control-label">Product Name <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Enter category name" required>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Product qty <sup class="mandatory">*</sup></label>
                        <input type="number" id="quantity" min="1" max="50" class="form-control"  name="p_qty" placeholder="Enter quantity" required>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="image" class="control-label">Product Image <sup class="mandatory">*</sup></label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="p_image" name="p_image" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif" required>
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

               <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="image" class="control-label">Front Image <sup class="mandatory">*</sup></label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="f_image" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif" required>
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

                

                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Category<sup class="mandatory">*</sup> </label>
                        <select class="form-control " name="p_cat" id="p_cat" required>
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
                <div class="col-md-12 my-2">
                    <textarea id="mytextarea" class="form-control" rows="5" placeholder="Description" spellcheck="false" name="p_desc"> </textarea>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <div class="input-group  mt-4">
                            <button type="submit" name="p_insert" title="Submit" class="btn btn-warning btn-block">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Image</th>
                                        <!-- <th>Other Image</th> -->
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
                                                <td><?php echo $count; ?></td>
                                                <td>
                                                    <img class="wd-120" src="<?php echo $row['product_img']; ?>" alt="" height="100" width="100">
                                                </td>
                                                <!-- <td>
                                                    <img class="wd-120" src="<?php echo $row['other_img']; ?>" alt="" height="100" width="100">
                                                </td> -->
                                                <td><?php echo $row['product_title']; ?></td>
                                                <td><?php echo $row['product_qty']; ?></td>
                                                <td><?php echo $row['product_cat']; ?></td>
                                                <td>
                                                    <input type="hidden" class="delete_id_value" value="<?php echo $row['product_id'] ?>">
                                                    <a href='editproducts.php?id=<?php echo $row['product_id']; ?>' type="button" class="btn btn-primary mr-1"><i class="fa fa-edit"></i>
                                                        <a href="javascript:void(0)" class="btn btn-danger delete_btn_ajax"><i class="fa fa-trash"></i></a>
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
<script>
    $(document).ready(function() {
        $('.delete_btn_ajax').click(function(e) {
            e.preventDefault();

            var deleteid = $(this).closest("tr").find('.delete_id_value').val();
            console.log(deleteid);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "products.php",
                            data: {
                                "delete_btn_set": 1,
                                "delete_id": deleteid,
                            },
                            success: function(response) {

                                swal("Data Delete Successfully.!", {
                                    icon: "success",
                                }).then((result) => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
        });
    });
</script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>