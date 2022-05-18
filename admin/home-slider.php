<?php
session_start();
// session_regenerate_id();
include 'partials/insert.php';

// if (!$_SESSION['HealGuruAdmin']) {
//     header("location:dashboard.php");
// }
?>
<?php include "include/css-url.php"; ?>
<?php include "partials/header.php"; ?>
<?php include "partials/sidebar.php"; ?>

<?php
if ($status) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hurry !!!!</strong> Login Successfully.
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
    <!-- row -->
    <div class="container">
        <form class="ml-10 mt-4" method="post" action="home-slider.php" enctype="multipart/form-data">
            <div class="row page-titles mx-0">
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label>Image (png,jpeg,jpg) (1920x800 in pixel, Max size 1MB)<sup class="mandatory">*</sup> </label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="packageFile" name="image" file-input="packageFile" accept=".jpg, .jpeg, .png">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <label for="input-rounded" class="control-label">Title<sup class="mandatory">*</sup> </label>
                        <input type="Title" class="form-control mt-4" name="title" placeholder="Title">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label></label>
                    <div class="input-group mt-4 mr-tp-1-per">
                        <button type="submit" name="submit" title="Submit" class="btn btn-info">Submit</button>
                        <!-- <button type="button" title="Cancel" class="btn btn-danger mr-lf-2-per" ng-click="cancel()">Cancel</button> -->
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <img class="wd-40" id="imgPreview" src="<?php echo $row['image_url']; ?>" width="100" height="100">
                </div> -->
            </div>
        </form>
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
                                        <th class="wd-10">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    include 'partials/db_connect.php';
                                    $sql = "SELECT * from `home-slider`";
                                    if (mysqli_query($conn, $sql)) {
                                        echo "";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
                                    $count = 1;
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) { ?>

                                            <tr dir-paginate="item in items=(tableList | filter:filterPro) | itemsPerPage: itemsPerPage" current-page='currentPage'>
                                                <td><?php echo $row['Id']; ?></td>
                                                <td>
                                                    <img class="wd-120" src="<?php echo $row['image_url']; ?>" alt="" height="100" width="100">
                                                </td>
                                                <td>
                                                <?php echo $row['slider_title']; ?>
                                                </td>

                                                <td>
                                                    <a href='home-slider.php?Id=<?php echo $row['Id']; ?>' data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mr-1"><i class="fa fa-edit"></i>
                                                        <a href='home-slider.php?Id=<?php echo $row['Id']; ?>' class="btn btn-danger" ng-click="deleteModal(item)"><i class="fa fa-trash"></i></a>
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="post" action="home-slider.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Image (png,jpeg,jpg) (1920x800 in pixel, Max size 1MB)<sup class="mandatory">*</sup> </label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="packageFile" name="image" file-input="packageFile" onchange="angular.element(this).scope().uploadImg(this)" accept=".jpg, .jpeg, .png">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <label for="input-rounded" class="control-label">Title<sup class="mandatory">*</sup> </label>
                            <input type="Title" class="form-control mt-4" name="title" placeholder="Title" maxlength="15">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="submit" name="update" title="update" class="btn btn-primary"><i class="fa fa-edit mr-2"></i>Update</button>
            </div>
        </div>
    </div>
</div>