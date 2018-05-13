<div class="modal fade" id="imageEditDialog" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="editLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 1005px;">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editLabel">上传</h4>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-9">
                        <div class="img-container">
                            <img id="image-x" src="/uploads/images/avatars/1525087780_YotvzQH8p2.png" alt="Picture" class="cropper-hidden">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <!-- <h3>Preview:</h3> -->
                        <div class="docs-preview clearfix">
                            <div class="img-preview preview-lg"></div>
                            <div class="img-preview preview-md"></div>
                            <div class="img-preview preview-sm"></div>
                            <div class="img-preview preview-xs"></div>
                            <div class="img-test"></div>
                        </div>

                        <!-- <h3>Data:</h3> -->
                        <div class="docs-data">
                            <div class="input-group input-group-sm">
                                <div class="input-group-addon">X</div>
                                <input type="text" class="form-control" id="dataX" placeholder="x">
                                <div class="input-group-addon">px</div>
                            </div>

                            <div class="input-group input-group-sm">
                                <div class="input-group-addon">Y</div>
                                <input type="text" class="form-control" id="dataY" placeholder="y">
                                <div class="input-group-addon">px</div>
                            </div>
                            <div class="input-group input-group-sm">
                                <div class="input-group-addon">Width</div>
                                <input type="text" class="form-control" id="dataWidth" placeholder="width">
                                <div class="input-group-addon">px</div>
                            </div>
                            <div class="input-group input-group-sm">
                                <div class="input-group-addon">Height</div>
                                <input type="text" class="form-control" id="dataHeight" placeholder="height">
                                <div class="input-group-addon">px</div>
                            </div>
                            <div class="input-group input-group-sm">
                                <div class="input-group-addon">Rotate</div>
                                <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                                <div class="input-group-addon">deg</div>
                            </div>
                            <div class="input-group input-group-sm">
                                <div class="input-group-addon">ScaleX</div>
                                <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                            </div>
                            <div class="input-group input-group-sm">
                                <div class="input-group-addon">ScaleY</div>
                                <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                            </div>
                        </div>

                        <div class="btn-toolbar docs-controls" role="toolbar">

                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
                                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="true" title="" data-original-title="$().cropper(&quot;rotate&quot;, -45)">
                                            <span class="fa fa-undo"></span>
                                        </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
                                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="true" title="" data-original-title="$().cropper(&quot;rotate&quot;, 45)">
                                            <span class="fa fa-redo"></span>
                                        </span>
                                </button>
                            </div>

                            <div class="btn-group" role="group" aria-label="Third group">
                                <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
                                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="" data-original-title="$().cropper(&quot;scaleX&quot;, -1)">
                                            <span class="fa fa-arrows-alt-h"></span>
                                        </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
                                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="" data-original-title="$().cropper(&quot;scaleY&quot;, -1)">
                                            <span class="fa fa-arrows-alt-v"></span>
                                        </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
                                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="" data-original-title="$().cropper(&quot;reset&quot;)">
                                            <span class="fa fa-sync"></span>
                                        </span>
                                </button>
                            </div>

                            <div class="btn-group btn-group-crop">
                                {{--<label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">--}}
                                {{--<input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">--}}
                                {{--<span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="" data-original-title="Import image with Blob URLs">--}}
                                {{--<span class="fa fa-upload"></span>--}}
                                {{--</span>--}}
                                {{--</label>--}}
                                <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ 'maxWidth': 4096, 'maxHeight': 4096 }">
                                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="" data-original-title="$().cropper(&quot;getCroppedCanvas&quot;, { maxWidth: 4096, maxHeight: 4096 })">
                                            Crop
                                        </span>
                                </button>
                            </div>
                        </div>

                        <div class="docs-toggles">
                            <!-- <h3>Toggles:</h3> -->
                            <div class="btn-group d-flex flex-nowrap" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="" data-original-title="aspectRatio: 16 / 9">
                                            16:9
                                        </span>
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="" data-original-title="aspectRatio: 4 / 3">
                                            4:3
                                        </span>
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="" data-original-title="aspectRatio: 1 / 1">
                                            1:1
                                        </span>
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="" data-original-title="aspectRatio: 2 / 3">
                                            2:3
                                        </span>
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="" data-original-title="aspectRatio: NaN">
                                            Free
                                        </span>
                                </label>
                            </div>

                        </div><!-- /.docs-toggles -->
                    </div>
                </div>

                <div class="row">




                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>