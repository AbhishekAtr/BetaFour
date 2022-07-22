

<?php

$status = false;
$statusMsg = false;
include 'include/db_connect.php';
//fetch.php  
if (isset($_POST["edit_id"])) {
    $query = "SELECT * from `home-slider` where Id = '" . $_POST["edit_id"] . "'";
    $result = mysqli_query($conn, $query);

    // echo json_encode($row);  
}
?>

<form method="post" action="home-slider.php" enctype="multipart/form-data" id="update">

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
                <label for=""><?php echo $row['image_url'] ?></label>
        </div>
        <div class="col-lg-12 col-md-12 mb-3">
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $row['slider_title'] ?>" required>
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
