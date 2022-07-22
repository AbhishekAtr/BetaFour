<?php
// Include the database configuration file  
include 'include/db_connect.php';

// If file upload form is submitted 

session_start();
if (isset($_POST["c_insert"])) {
    $cat_title = $_POST['category'];
    $cat_desc = $_POST['cat_desc'];

    if (!empty($_FILES["c_image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["c_image"]["name"]);
        // $title = $_FILES['title']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['c_image']['tmp_name'];

            $imgContent = addslashes(file_get_contents($image));
            $destinationfile = 'upload/' . $fileName;
            if (move_uploaded_file($image, $destinationfile)) {
                // Insert image content into database
                $insert = "INSERT INTO `categories`( `cat_title`,`cat_img`, `cat_desc`) VALUES ('$cat_title','$destinationfile', ' $cat_desc')";
                $smt = $conn->prepare($insert);
                $smt->execute();
                if ($insert) {
                    $_SESSION['status'] = "Category Insert Successfully";
                    $_SESSION['status_code'] = "success";
                    // header("loaction: categories.php");
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
if (isset($_POST['update'])) {
    $id = $_POST['edit_id'];

    $title = $_POST['title'];
    $desc = $_POST['desc'];
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
                $query = "UPDATE `categories` SET  `cat_img`='$destinationfile', `cat_title`= '$title', `cat_desc` = '$desc' WHERE cat_id='$id'";
                $smt = $conn->prepare($query);
                $smt->execute();
                if ($query) {
                    $_SESSION['status'] = "Category Update Successfully";
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
    $del_id = $_POST['delete_id'];
    $delete = mysqli_query($conn, "DELETE FROM `categories` WHERE `cat_id`= ' $del_id'");
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
            <form class="mt-5" method="post" action="categories.php" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="category" class="control-label">Category Name <sup class="text-danger bold">*</sup></label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Enter category name" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="cat_desc" class="control-label">Category Description <sup class="text-danger bold">*</sup></label>
                            <input type="text" class="form-control" id="cat_desc" name="cat_desc" placeholder="Enter Description" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label>Image (png,jpeg,jpg) (Max size 1MB)<sup class="text-danger bold">*</sup> </label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="c_image" name="c_image" file-input="packageFile" accept=".jpg, .jpeg, .png" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 mt-3">
                        <button type="submit" name="c_insert" class="btn btn-success">Upload</button>
                    </div>
                    <div class="col-lg-1 mt-3">
                        <a href="categories.php" type="button" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <?php
        $sql = "SELECT * from `categories` ORDER BY cat_id DESC";
        if (mysqli_query($conn, $sql)) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $count = 1;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
            <div class="adminForm card m-3 p-5">
                <table class="table  table-hover" id="employee_data">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th style="width:40%">Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) { ?>

                            <tr>
                                <td><?php echo $count; ?></td>

                                <td><?php echo $row['cat_title']; ?></td>
                                <td>
                                    <img src="<?php echo $row['cat_img']; ?>" alt="" width="100" height="100">
                                </td>
                                <td><?php echo $row['cat_desc']; ?></td>
                                <td>
                                    <input type="hidden" class="delete_id_value" value="<?php echo $row['cat_id'] ?>">
                                    <button type="button" class="btn btn-primary editbtn mr-1"><i class="fa fa-edit"></i></button>
                                    <!-- <a href='editcategories.php?id=<?php echo $row['cat_id'] ?>' type="button" class="btn btn-primary mr-1"><i class="fa fa-edit"></i> -->
                                    <a href="javascript:void(0)" class="btn btn-danger delete_data"><i class="fa fa-trash"></i></a>
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
    <?php
    include 'include/footer.php';
    include 'include/js-url.php';
    include "include/editmodal.php";
    ?>
    <?php include "include/deletemodal.php"; ?>

    <script>
        $(document).ready(function() {
            $('.delete_data').click(function(e) {
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                //   console.log(deleteid);
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
                                url: "categories.php",
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
            $('.editbtn').click(function(e) {
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                // console.log(editid);
                $.ajax({
                    type: "POST",
                    url: "editcat.php",
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
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>