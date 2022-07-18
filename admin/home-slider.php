<?php
// Include the database configuration file  
require_once 'include/db_connect.php';

// If file upload form is submitted 
$status = false;
$statusMsg = false;
session_start();
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        // $title = $_FILES['title']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];

            $imgContent = addslashes(file_get_contents($image));
            $destinationfile = 'upload/' . $fileName;
            move_uploaded_file($image, $destinationfile);
            // Insert image content into database 
            $insert = $conn->query("INSERT INTO `home-slider`( `image_url`,`slider_title`) VALUES ('$destinationfile','$title')");

            if ($insert) {
                $status = true;
                session_destroy();
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
// Display status message 
echo $statusMsg;
?>



<?php
if (isset($_POST['delete_btn_set'])) {
    $id = $_POST['delete_id'];
    $delete = mysqli_query($conn, $query = "DELETE FROM `home-slider` WHERE Id='$id'");
    $query = mysqli_query($conn, $delete);
}
?>
<?php
include 'include/css-url.php';
include 'include/header.php';
?>
<section class="main-section" id="main">
    <div class="container">
        <div class="adminForm card m-3 p-5">
            <form method="post" action="home-slider.php" enctype="multipart/form-data" id="hide">
                <?php
                if ($status) {

                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hurryyyyy!!!!</strong>  Data Insert Successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }

                if ($statusMsg) {

                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <strong>Error</strong> ' . $statusMsg . '
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                }
                ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="image" name="image" file-input="packageFile" accept=".jpg, .jpeg, .png" required>
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="Title" class="form-control" name="title" id="title" placeholder="Title" required>
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" name="submit" title="Submit" class="btn btn-success btn-block">Upload</button>
                    </div>
                    <div class="col-lg-1">
                        <a href="home-slider.php" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="adminTable card m-3 p-5">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <table class="table table-striped" id="employee_data">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * from `home-slider`";
                                    if (mysqli_query($conn, $sql)) {
                                    } else {
                                    }
                                    $count = 1;
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td>
                                                    <img class="wd-120" src="<?php echo $row['image_url']; ?>" alt="" height="100" width="100">
                                                </td>
                                                <td>
                                                    <?php echo $row['slider_title']; ?>
                                                </td>
                                                <td>
                                                    <input type="hidden" class="delete_id_value" value="<?php echo $row['Id'] ?>">
                                                    <a href='edithomeslider.php?id=<?php echo $row['Id'] ?>' type="button" class="btn btn-primary mr-1"><i class="fa fa-edit"></i>
                                                    <a href="javascript:void(0)" class="btn btn-danger delete_btn_ajax">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
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
    </div>
</section>
<?php
include 'include/footer.php';
include 'include/js-url.php';
include "include/deletemodal.php";
?>
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
                            url: "home-slider.php",
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


<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="auth/edit-data.php" enctype="multipart/form-data" id="hide">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="row">
                        <div class="col-lg-12 col-md-\12">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="e_image" name="e_image" file-input="packageFile" accept=".jpg, .jpeg, .png" required>
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <input type="Title" class="form-control" name="title" id="title" placeholder="Title" required>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" name="updatedata" class="btn btn-success btn-block">Update</button>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>