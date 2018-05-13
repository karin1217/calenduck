<!-- Modal -->
<div class="modal fade" id="uploadDialog" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">上传</h4>
            </div>
            <div class="modal-body">
                <div>
                    <form class="mb-3 dm-uploader" id="drag-and-drop-zone">
                        <div class="form-row">
                            <div class="col-md-8 col-sm-12">
                                <div class="from-group mb-2">
                                    <label>Image Uploader</label>
                                    <input type="text" class="form-control" aria-describedby="fileHelp" placeholder="No image uploaded..." readonly="readonly">

                                    <div class="progress mb-2 d-none">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0">
                                            0%
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div role="button" class="btn btn-primary mr-2">
                                        <i class="glyphicon glyphicon-folder-open"></i> Browse Files <input type="file" title="Click to add Files" accept="*">
                                    </div>
                                    <small class="status text-muted">Select a file or drag it over this area..</small>
                                </div>
                            </div>
                            <div class="col-md-4  d-md-block  d-sm-none">
                                <img src="https://danielmg.org/assets/image/noimage.jpg?v=v10" alt="..." class="img-thumbnail">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>