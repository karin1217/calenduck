<!-- Show the cropped image in modal -->
{{--<div class="modal fade" id="imageEditDialog" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="editLabel">--}}
<div class="modal fade" id="getCroppedCanvasDialog" role="dialog" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="docs-cropped modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" id="download" href="" download="cropped.jpg">Download</a>
            </div>
        </div>
    </div>
</div><!-- /.modal -->