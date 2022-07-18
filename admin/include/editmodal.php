<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="home-slider.php" enctype="multipart/form-data" id="hide">
                    <input type="hidden" name="update_id" id="update_id">
                    <div class="row">
                        <div class="col-lg-12 col-md-\12">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="image" name="image" file-input="packageFile" accept=".jpg, .jpeg, .png" required>
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