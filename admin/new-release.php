<?php
// Include the database configuration file  
include 'include/db_connect.php';


if (isset($_POST["n_insert"])) {
    $product_title = $_POST['n_name'];
    $product_cat = $_POST['n_cat'];
    $product_desc = $_POST['n_desc'];
    if (!empty($_FILES["n_image"]["name"]) || !empty($_FILES["f_image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["n_image"]["name"]);
        $fileName1 = basename($_FILES["f_image"]["name"]);
        // $title = $_FILES['title']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes) || in_array($fileType1, $allowTypes)) {
            $image = $_FILES['n_image']['tmp_name'];
            $image1 = $_FILES["f_image"]["tmp_name"];

            $imgContent = addslashes(file_get_contents($image));
            $imgContent1 = addslashes(file_get_contents($image1));

            $destinationfile = 'upload/' . $fileName;
            $destinationfile1 = 'upload/' . $fileName1;

            if (move_uploaded_file($image, $destinationfile) || move_uploaded_file($image1, $destinationfile1)) {

                // Insert image content into database

                $insert = "INSERT INTO `new-release`( `image`, `other_img`, `title`, `description`, `category`) VALUES ('$destinationfile','$destinationfile1','$product_title','$product_desc','$product_cat')";
                $smt = $conn->prepare($insert);
                $smt->execute();
                if ($insert) {
                    $_SESSION['status'] = "Product Insert Successfully";
                    $_SESSION['status_code'] = "success";
                    // session_destroy();
                    // header("location: products.php");
                } else {
                    $_SESSION['status'] = "File upload failed, please try again.";
                    $_SESSION['status_code'] = "error";
                }
            } else {
                $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
                $_SESSION['status_code'] = "error";
            }
        } else {
            $_SESSION['status'] = "Please select an image file to upload.";
            $_SESSION['status_code'] = "error";
        }
    }
}
?>
<?php
if (isset($_POST["n_update"])) {
    $id = $_POST['edit_id'];
    $product_title = $_POST['pname'];
    $product_cat = $_POST['pcat'];
    $product_desc = $_POST['pdesc'];
    if (!empty($_FILES["pimage"]["name"]) || !empty($_FILES["fimage"]["name"])) {

        // Get file info 
        $fileName = basename($_FILES["pimage"]["name"]);
        $fileName1 = basename($_FILES["fimage"]["name"]);

        // $title = $_FILES['title']['name'];
        $fileType1 = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileType2 = pathinfo($fileName1, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType1, $allowTypes) || in_array($fileType2, $allowTypes)) {
            $image = $_FILES['pimage']['tmp_name'];
            $image1 = $_FILES["fimage"]["tmp_name"];

            $imgContent1 = addslashes(file_get_contents($image));
            $imgContent2 = addslashes(file_get_contents($image1));

            $destinationfile = 'upload/' . $fileName;
            $destinationfile1 = 'upload/' . $fileName1;

            if (move_uploaded_file($image, $destinationfile) || move_uploaded_file($image1, $destinationfile1)) {
                // Update content into database
                $update = "UPDATE `new-release` SET `image`='$destinationfile',`other_img`='$destinationfile1',`title`='$product_title',`description`='$product_desc',`category`='$product_cat' WHERE id='$id'";
                $smt = $conn->prepare($update);
                $smt->execute();
                if ($update) {
                    $_SESSION['status'] = "New Product Update Successfully";
                    $_SESSION['status_code'] = "success";
                } else {
                    $_SESSION['status'] = "File upload failed, please try again.";
                    $_SESSION['status_code'] = "error";
                }
            } else {
                $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
                $_SESSION['status_code'] = "error";
            }
        } else {
            $_SESSION['status'] = "Please select an image file to upload.";
            $_SESSION['status_code'] = "error";
        }
    }
}
?>
<?php
if (isset($_POST['delete_btn_set'])) {
    $id = $_POST['delete_id'];
    $delete = mysqli_query($conn, $query = "DELETE FROM `new-release` WHERE id='$id'");
    $query = mysqli_query($conn, $delete);
}
?>


<?php
include 'include/css-url.php';
include 'include/header.php';
?>
<div class="main-section" id="main">
    <div class="container">
        <div class="adminForm card m-3 p-5">
            <form method="post" action="new-release.php" enctype="multipart/form-data">
                <div class="row page-titles mx-0">
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="productname" class="control-label">Product Name <sup class="text-danger bold">*</sup></label>
                            <input type="text" class="form-control" id="n_name" name="n_name" placeholder="Enter category name" required>
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
                                <input type="file" class="form-control" name="f_image" id="f_image" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="category" class="control-label">Category<sup class="text-danger bold">*</sup> </label>
                            <select class="form-select" name="n_cat" id="n_cat" required>
                                <option selected>Select Category</option>
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
                        <div class="form-group">
                        <textarea id="editor1" name="n_desc"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-1 mt-3">
                        <button type="submit" name="n_insert" class="btn btn-success">Upload</button>
                    </div>
                    <div class="col-lg-1 mt-3">
                        <a href="new-release.php" type="button" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="adminTable card m-3 p-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="employee_data">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th class="wd-10">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * from `new-release`";
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
                                            <img class="wd-120" src="<?php echo $row['image']; ?>" alt="" height="100" width="100">
                                        </td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td>
                                            <input type="hidden" class="delete_id_value" value="<?php echo $row['id'] ?>">
                                            <button type="button" class="btn btn-primary editbtn mr-1"><i class="fa fa-edit"></i></button>
                                            <!--<a href='editnewrelease.php?id=<?php echo $row['id']; ?>' type="button" class="btn btn-primary mr-1"><i class="fa fa-edit"></i></a>-->
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
            </div>
        </div>
    </div>
</div>




<?php
include 'include/footer.php';
include 'include/js-url.php';
include "include/editmodal.php";
?>
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
                            url: "new-release.php",
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
    
    $(document).on('click', '.editbtn', function(e) {
     e.preventDefault();
            var deleteid = $(this).closest("tr").find('.delete_id_value').val();
            // console.log(editid);
            $.ajax({
                type: "POST",
                url: "editnewproduct.php",
                data: {
                    "edit_id": deleteid,
                },
                success: function(response) {
                    // console.log(response);
                    $('#editdata').html(response);
                    // $('#e_image').val(response[1]); 
                    $('#editModal').modal('show');
                }
            });
        });
</script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>