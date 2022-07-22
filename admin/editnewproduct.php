<?php

$status = false;
$statusMsg = false;
include 'include/db_connect.php';
//fetch.php  
if (isset($_POST["edit_id"])) {
    $query = "SELECT * from `new-release` where id = '" . $_POST["edit_id"] . "'";
    $result = mysqli_query($conn, $query);

    // echo json_encode($row);  
}
?>

<form method="post" action="new-release.php" enctype="multipart/form-data">
    <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $_POST["edit_id"] ?>">
    <div class="row">
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="col-md-12 col-sm-6">
                <div class="form-group">
                    <label for="productname" class="control-label">Product Name <sup class="text-danger bold">*</sup></label>
                    <input type="text" class="form-control" id="pname" name="pname" placeholder="Enter product name" value="<?php echo $row['title'] ?>" required>
                </div>
            </div>
            <div class="col-md-12 col-sm-6">
                <div class="form-group">
                    <label for="image" class="control-label">Product Image <sup class="text-danger bold">*</sup></label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="pimage" name="pimage" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-6">
                <div class="form-group">
                    <label for="image" class="control-label">Other Image <sup class="text-danger bold">*</sup></label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="fimage" id="fimage" file-input="packageFile" accept=".jpg, .jpeg, .png, .gif" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-6">
                <div class="form-group">
                    <label for="category" class="control-label">Category<sup class="text-danger bold">*</sup> </label>
                    <select class="form-select" name="pcat" id="pcat" required>
                        <option selected><?php echo $row['category'] ?></option>
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
            <div class="col-md-12 col-lg-12 mt-4">
                <?php
                $id = $_POST["edit_id"];
                $query = mysqli_query($conn, "SELECT * from `new-release` where id='$id'");
                $row = mysqli_fetch_array($query);
                ?>
                <!-- <div class="summernote">summernote 1</div> -->
                <div class="form-group">
                    <textarea class="form-control editor" name="pdesc" id="pdesc"><?php echo $row['description'] ?></textarea>
                </div>
            <?php
        }
            ?>
            </div>

            <div id="editor"></div>
            <div class="col-lg-2">
                <button type="submit" name="n_update" id="n_update" class="btn btn-success btn-block">Update</button>
            </div>
            <div class="col-lg-2">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
    </div>
</form>

<script>
    tinyMCE.remove();  
    tinymce.init({
        selector: '.editor',
        menubar: true,
        height: '400',
        plugins: 'link',
        toolbar: 'link'
    });
</script>