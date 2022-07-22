<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="editdata">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="e_image" name="e_image" file-input="packageFile" accept=".jpg, .jpeg, .png" required>
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                            <!-- <img src="" name="image" id="image" height="100" width="100"/> -->
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <input type="text" class="form-control" name="title" id="title1" placeholder="Title" required>
                        </div>
                        <input type="hidden" class="form-control" name="edit_id" id="edit_id">
                        <div class="col-lg-2">
                            <button type="submit" name="update" id="update" class="btn btn-success btn-block">Update</button>
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