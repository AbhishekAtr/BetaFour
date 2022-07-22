

<?php

$status = false;
$statusMsg = false;
include 'include/db_connect.php';
//fetch.php  
if (isset($_POST["edit_id"])) {
    $query = "SELECT * from `categories` where cat_id= '" . $_POST["edit_id"] . "'";
    $result = mysqli_query($conn, $query);

    // echo json_encode($row);  
}
?>

<form method="post" action="categories.php" enctype="multipart/form-data" id="update">
<?php

if ($status) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You image update successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if ($statusMsg) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong> '. $statusMsg .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
    <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $_POST["edit_id"] ?>">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="e_image" name="e_image" file-input="packageFile" accept=".jpg, .jpeg, .png" required>
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <label for="" class="mb-2"><?php echo $row['cat_img'] ?></label>
        </div>
        <div class="col-lg-12 col-md-12 mb-3">
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $row['cat_title'] ?>" required>
        </div>
        <div class="col-lg-12 col-md-12 mb-3">
            <input type="text" class="form-control" name="desc" id="desc" placeholder="Title" value="<?php echo $row['cat_desc'] ?>" required>
        </div>
    <?php
            }
    ?>
    <div class="col-lg-2">
        <button type="submit" name="update" id="update" class="btn btn-success btn-block">Update</button>
    </div>
    <div class="col-lg-2">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
</form>
