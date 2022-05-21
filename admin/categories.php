<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/db_connect.php';

    $cat_title = $_POST["category"];

    $exists = false;
    if (isset($_POST['c_insert'])) {
        $sql = "INSERT INTO `categories`( `cat_title`) VALUES ('$cat_title')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
            header("loaction: categories.php");
        }
    } else {
        $showError = "Error";
    }
}

?>


<?php include "include/css-url.php"; ?>

<?php include "partials/sidebar.php"; ?>

<?php

if ($showAlert) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hurry !!!!</strong> Your data is insert successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}

if ($showError) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
?>

<div class="content-body" id="main">
    <div class="container">
        <form class=" mt-5" method="post" action="categories.php">
            <div class="row page-titles mx-0">
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label for="category" class="control-label">Category Name <sup class="mandatory">*</sup></label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Enter category name" required>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label></label>
                    <div class="input-group mr-tp-1-per">
                        <button type="submit" name="c_insert" title="Submit" class="btn btn-info">Add Category</button>
                        <!-- <button type="button" title="Cancel" class="btn btn-danger mr-lf-2-per" ng-click="cancel()">Cancel</button> -->
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <img class="wd-40" id="imgPreview" src="<?php echo $row['image_url']; ?>" width="100" height="100">
                </div> -->
            </div>
        </form>
    </div>


    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
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
                            <table class="table  table-hover">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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

                                            <tr>
                                                <td><?php echo $row['cat_id']; ?></td>

                                                <td><?php echo $row['cat_title']; ?></td>
                                                <td>
                                                    <a href='editcategories.php?id=<?php echo $row['cat_id'] ?>' type="button" class="btn btn-primary mr-1"><i class="fa fa-edit"></i>
                                                        <a href='#' class="btn btn-danger deletebtn" type="button"><i class="fa fa-trash"></i></a>
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


