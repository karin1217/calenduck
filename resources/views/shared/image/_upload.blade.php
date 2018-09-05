<style>
    .dm-uploader .btn {
        position: relative;
        overflow: hidden;
        margin: 14px;
        left: 1px;
    }

    .cut {
        margin: auto;
        width: 300px;
        height: 300px;
        /*width: 800px;*/
        /*height: 800px;*/
        display: inline-block;
    }

    .show-preview {
        flex: 1;
        -webkit-flex: 1;
        display: flex;
        display: -webkit-flex;
        justify-content: center;
        -webkit-justify-content: center;
        display: inline-block;
        border: 1px solid #EEEEEE;
    }
    .show-preview .preview{
        overflow: hidden;
        border-radius: 50%;
        border:1px solid #cccccc;
        background: #cccccc;
        margin-left: 40px;

    }

    #preview {
        background-size: cover;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="uploadDialog-old" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">上传</h4>
            </div>
            <div class="modal-body">
                <div>
                    <form class="mb-3 dm-uploader" id="drag-and-drop-zone">
                        {{--<div class="form-row">--}}
                            {{--<div class="col-md-12 col-sm-12">--}}
                                {{--<div class="from-group mb-2">--}}
                                    {{--<label>Image Uploader</label>--}}
                                    {{--<input type="text" class="form-control" aria-describedby="fileHelp" placeholder="No image uploaded..." readonly="readonly">--}}

                                    {{--<div class="progress mb-2 d-none">--}}
                                        {{--<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0">--}}
                                            {{--0%--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<div role="button" class="btn btn-primary mr-2">--}}
                                        {{--<i class="glyphicon glyphicon-folder-open"></i> Browse Files <input type="file" title="Click to add Files" accept="*">--}}
                                    {{--</div>--}}
                                    {{--<small class="status text-muted">Select a file or drag it over this area..</small>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-row">
                            <div class="col-md-12  d-md-block  d-sm-none">
                                {{--<img src="https://danielmg.org/assets/image/noimage.jpg?v=v10" alt="..." class="img-thumbnail">--}}

                                <div id="cropAvatar">
                                    <p>裁剪区</p>
                                    <div class="cut">
                                        <vue-cropper
                                                ref="cropper"
                                                :img="option.img"
                                                :output-size="option.size"
                                                :output-type="option.outputType"
                                                :info="true"
                                                :full="option.full"
                                                :can-move="option.canMove"
                                                :can-move-box="option.canMoveBox"
                                                :fixed-box="option.fixedBox"
                                                :original="option.original"
                                                :can-scale="option.canScale"
                                                :auto-crop="option.autoCrop"
                                                :auto-crop-width="option.autoCropWidth"
                                                :auto-crop-height="option.autoCropHeight"

                                                @realtime="realTime"
                                                :high ="option.high"
                                                {{--v-bind.sync="realTime"--}}
                                                @imgload="imgLoad"
                                        ></vue-cropper>

                                    </div>
                                    {{--<label>预览</label>--}}
                                    <div class="show-preview" :style="{'width': previews.w + 'px', 'height': previews.h + 'px',  'overflow': 'hidden', 'margin': '5px'}">

                                        <div :style="previews.div" id="preview">
                                            {{--<img :src="previews.url" :style="previews.img">--}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <button @click.prevent="autoChangeImg" class="btn">changeImg</button>
                                        <div role="button" class="btn btn-primary mr-2">
                                            <i class="glyphicon glyphicon-folder-open"></i> 更换图片 <input type="file" id="uploads"  accept="image/png, image/jpeg, image/gif, image/jpg" @change="changeImg($event, 1)">
                                        </div>

                                        <button type="button" class="btn btn-success" @click.prevent="sendPost"><i id="upload-icon" class="fas fa-cloud-upload-alt"></i> 上 传</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> 取 消</button>


                                        {{--<label class="btn" for="uploads">upload</label>--}}
                                        {{--<input type="file" id="uploads" style="position:absolute; clip:rect(0 0 0 0);" accept="image/png, image/jpeg, image/gif, image/jpg" @change="uploadImg($event, 2)">--}}
                                        {{--<button @click.prevent="startCrop" v-if="!crap" class="btn btn-primary">start</button>--}}
                                        {{--<button @click.prevent="stopCrop" v-else class="btn btn-primary">stop</button>--}}
                                        {{--<button @click.prevent="clearCrop" class="btn">clear</button>--}}
                                        {{--<button @click.prevent="realTime" class="btn">Real</button>--}}
                                        {{--<button @click="refreshCrop" class="btn">refresh</button>--}}
                                        {{--<button @click.prevent="changeScale(1)" class="btn">+</button>--}}
                                        {{--<button @click.prevent="changeScale(-1)" class="btn">-</button>--}}
                                        {{--<button @click="rotateLeft" class="btn">rotateLeft</button>--}}
                                        {{--<button @click="rotateRight" class="btn">rotateRight</button>--}}
                                        {{--<button @click.prevent="finish('base64')" class="btn">preview(base64)</button>--}}
                                        {{--<button @click.prevent="finish('blob')" class="btn">preview(blob)</button>--}}
                                        {{--<a @click.prevent="down('base64')" class="btn">download(base64)</a>--}}
                                        {{--<a @click.prevent="down('blob')" class="btn">download(blob)</a>--}}

                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--<div class="modal-footer">--}}
                {{----}}

            {{--</div>--}}
        </div>
    </div>
</div>