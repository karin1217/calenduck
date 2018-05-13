$(document).ready(function() {
    function getFileExtension(mimeType) {
        switch (mimeType) {
            case 'image/png':
                return 'png';
            case 'image/gif':
                return 'gif';
            case 'image/jpg':
            case 'image/jpeg':
            default:
                return 'jpg';
        }
    }


    /**
     * -------------------------------------------------------------
     * 图像裁切
     * -------------------------------------------------------------
     */

        //var console = window.console || { log: function () {} };
    var URL = window.URL || window.webkitURL;
    var $image = $('#image-x');
    //var $download = $('#download');
    var $dataX = $('#dataX');
    var $dataY = $('#dataY');
    var $dataHeight = $('#dataHeight');
    var $dataWidth = $('#dataWidth');
    var $dataRotate = $('#dataRotate');
    var $dataScaleX = $('#dataScaleX');
    var $dataScaleY = $('#dataScaleY');
    var options = {
        aspectRatio: 1,
        preview: '.img-preview',
        viewMode: 1,
        crop: function (e) {
            $dataX.val(Math.round(e.detail.x));
            $dataY.val(Math.round(e.detail.y));
            $dataHeight.val(Math.round(e.detail.height));
            $dataWidth.val(Math.round(e.detail.width));
            $dataRotate.val(e.detail.rotate);
            $dataScaleX.val(e.detail.scaleX);
            $dataScaleY.val(e.detail.scaleY);
        }
    };

    var fileExt;
    var uploadedImageName;
    var uploadedImageType;
    var uploadedImageURL;


    // Tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Buttons
    if (!$.isFunction(document.createElement('canvas').getContext)) {
        $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
    }
    if (typeof document.createElement('cropper').style.transition === 'undefined') {
        $('button[data-method="rotate"]').prop('disabled', true);
        $('button[data-method="scale"]').prop('disabled', true);
    }

    // Download
    // console.log($download[0]);
    // if (typeof $download[0].download === 'undefined') {
    //     $download.addClass('disabled');
    // }

    // Options
    $('.docs-toggles').on('change', 'input', function () {
        var $this = $(this);
        var name = $this.attr('name');
        var type = $this.prop('type');
        var cropBoxData;
        var canvasData;

        if (!$image.data('cropper')) {
            return;
        }

        if (type === 'checkbox') {
            options[name] = $this.prop('checked');
            cropBoxData = $image.cropper('getCropBoxData');
            canvasData = $image.cropper('getCanvasData');

            options.ready = function () {
                $image.cropper('setCropBoxData', cropBoxData);
                $image.cropper('setCanvasData', canvasData);
            };
        } else if (type === 'radio') {
            options[name] = $this.val();
        }

        $image.cropper('destroy').cropper(options);
    });


    // Methods
    $('.docs-controls').on('click', '[data-method]', function () {
        uploadedImageType = fileMimeType;
        var $this = $(this);
        var data = $this.data();
        var cropper = $image.data('cropper');
        var cropped;
        var $target;
        var result;

        if ($this.prop('disabled') || $this.hasClass('disabled')) {
            return;
        }

        if (cropper && data.method) {
            data = $.extend({}, data); // Clone a new one

            if (typeof data.target !== 'undefined') {
                $target = $(data.target);

                if (typeof data.option === 'undefined') {
                    try {
                        data.option = JSON.parse($target.val());
                    } catch (e) {
                        console.log(e.message);
                    }
                }
            }

            cropped = cropper.cropped;
            console.log(cropped);

            switch (data.method) {
                case 'rotate':
                    if (cropped && options.viewMode > 0) {
                        $image.cropper('clear');
                    }

                    break;

                case 'getCroppedCanvas':
                    if (uploadedImageType === 'image/jpeg') {
                        if (!data.option) {
                            data.option = {};
                        }

                        //data.option.fillColor = '#fff';
                    }

                    break;
            }

            result = $image.cropper(data.method, data.option, data.secondOption);

            switch (data.method) {
                case 'rotate':
                    if (cropped && options.viewMode > 0) {
                        $image.cropper('crop');
                    }

                    break;

                case 'scaleX':
                case 'scaleY':
                    $(this).data('option', -data.option);
                    break;

                case 'getCroppedCanvas':
                    if (result) {
                        // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
                        cropper.getCroppedCanvas().toBlob(function (blob) {
                            var formData = new FormData();
                            formData.append('croppedImage', blob);
                            formData.append('width', $dataWidth.val());
                            formData.append('height', $dataHeight.val());

                            // Use `jQuery.ajax` method
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: "{{ route('users.crop.avatar', Auth::user()) }}",
                                method: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                dataType: 'json',
                                success: function (data) {
                                    if (!data.success) {
                                        console.log(data);
                                        $('body').overhang({
                                            type: 'error',
                                            message: data.msg,
                                            duration: 5,
                                            overlay: true
                                        })
                                        return false;
                                    } else {
                                        console.log(data);
                                        // $image.cropper('destroy');
                                        $('#imageEditDialog').modal('hide');
                                        $('.gravatar').attr('src', '/' + data.image);
                                        console.log('Upload success');
                                    }
                                },
                                error: function () {
                                    console.log('Upload error');
                                }
                            });
                        });
                    }

                    break;

                case 'destroy':
                    if (uploadedImageURL) {
                        URL.revokeObjectURL(uploadedImageURL);
                        uploadedImageURL = '';
                        $image.attr('src', originalImageURL);
                    }

                    break;
            }

            if ($.isPlainObject(result) && $target) {
                try {
                    $target.val(JSON.stringify(result));
                } catch (e) {
                    console.log(e.message);
                }
            }

        }
    });

    $('#imageEditDialog').on('show.bs.modal', function (e) {
        console.log('SHOW IMAGE EDIT DIALOG');
        $('.docs-toggles').change();
    }).on('shown.bs.modal', function (e) {


        $('#image-x').attr('src', $('.gravatar').attr('src'));
        $('#image-x').cropper('destroy').cropper(options);
        //$('#image-x').cropper(options);

    }).on('hidden.bs.modal', function (e) {

    });

    $('#getCroppedCanvasDialog').on('show.bs.modal', function (e) {
        console.log('Cropped canvas dialog show...');
        $('#imageEditDialog').modal('hide');
    }).on('shown.bs.modal', function (e) {
        console.log('Cropped canvas dialog shown...');
        $('#getCroppedCanvasDialog').modal('handleUpdate');
    }).on('hidden.bs.modal', function (e) {
        console.log('Cropped canvas dialog hidden...');
        $('#imageEditDialog').modal('show');
        $('#imageEditDialog').modal('handleUpdate');
    });

    function ui_single_update_active(element, active) {
        element.find('div.progress').toggleClass('d-none', !active);
        element.find('input[type="text"]').toggleClass('d-none', active);

        element.find('input[type="file"]').prop('disabled', active);
        element.find('.btn').toggleClass('disabled', active);

        element.find('.btn i').toggleClass('fa-circle-o-notch fa-spin', active);
        element.find('.btn i').toggleClass('fa-folder-o', !active);
    }

    function ui_single_update_progress(element, percent, active) {
        active = (typeof active === 'undefined' ? true : active);

        var bar = element.find('div.progress-bar');

        bar.width(percent + '%').attr('aria-valuenow', percent);
        bar.toggleClass('progress-bar-striped progress-bar-animated', active);

        if (percent === 0) {
            bar.html('');
        } else {
            bar.html(percent + '%');
        }
    }

    function ui_single_update_status(element, message, color) {
        color = (typeof color === 'undefined' ? 'muted' : color);

        element.find('small.status').prop('class', 'status text-' + color).html(message);
    }

    /*
    * Some helper functions to work with our UI and keep our code cleaner
    */

    // Adds an entry to our debug area
    function ui_add_log(message, color) {
        var d = new Date();

        var dateString = (('0' + d.getHours())).slice(-2) + ':' +
            (('0' + d.getMinutes())).slice(-2) + ':' +
            (('0' + d.getSeconds())).slice(-2);

        color = (typeof color === 'undefined' ? 'muted' : color);

        var template = $('#debug-template').text();
        template = template.replace('%%date%%', dateString);
        template = template.replace('%%message%%', message);
        template = template.replace('%%color%%', color);

        $('#debug').find('li.empty').fadeOut(); // remove the 'no messages yet'
        $('#debug').prepend(template);
    }

    /*
     * For the sake keeping the code clean and the examples simple this file
     * contains only the plugin configuration & callbacks.
     *
     * UI functions ui_* can be located in:
     *   - assets/demo/uploader/js/ui-main.js
     *   - assets/demo/uploader/js/ui-multiple.js
     *   - assets/demo/uploader/js/ui-single.js
     */
    $('#drag-and-drop-zone').dmUploader({ //
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('users.upload.avatar', Auth::user()) }}",
        maxFileSize: 9000000, // 3 Megs max
        multiple: false,
        dataType: 'json',
        allowedTypes: 'image/*',
        extFilter: ['jpg', 'jpeg', 'png', 'gif'],
        fieldName: 'uploadfile',
        onDragEnter: function () {
            // Happens when dragging something over the DnD area
            this.addClass('active');
        },
        onDragLeave: function () {
            // Happens when dragging something OUT of the DnD area
            this.removeClass('active');
        },
        onInit: function () {
            // Plugin is ready to use
            ui_add_log('Penguin initialized :)', 'info');

            this.find('input[type="text"]').val('');

            var img = this.find('img');
            img.attr('src', $('.gravatar').attr('src'));
        },
        onComplete: function () {
            // All files in the queue are processed (success or error)
            ui_add_log('All pending tranfers finished');
        },
        onNewFile: function (id, file) {
            // When a new file is added using the file selector or the DnD area
            ui_add_log('New file added #' + id);

            if (typeof FileReader !== "undefined") {
                var reader = new FileReader();
                var img = this.find('img');

                reader.onload = function (e) {
                    img.attr('src', e.target.result);
                }
                reader.readAsDataURL(file);

                img.css('width', '100%');
            }
        },
        onBeforeUpload: function (id) {
            // about tho start uploading a file
            ui_add_log('Starting the upload of #' + id);
            ui_single_update_progress(this, 0, true);
            ui_single_update_active(this, true);

            ui_single_update_status(this, 'Uploading...');
        },
        onUploadProgress: function (id, percent) {
            // Updating file progress
            ui_single_update_progress(this, percent);
        },
        onUploadSuccess: function (id, data) {
            var response = data;//JSON.stringify(data);
            console.log(data);
            console.log(response);

            if (!response.success) {
                ui_single_update_status(this, 'File type is not an image', 'danger');
                return false;
            }

            fileMimeType = response.mimeType;
            console.log(fileMimeType);

            // A file was successfully uploaded
            ui_add_log('Server Response for file #' + id + ': ' + response.msg);
            ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');

            ui_single_update_active(this, false);

            // You should probably do something with the response data, we just show it
            //this.find('input[type="text"]').val(response);
            this.find('input[type="text"]').val(response.msg);

            $('.gravatar').attr('src', '/' + response.image);

            ui_single_update_status(this, 'Upload completed.', 'success');

            $('#uploadDialog').modal('hide');


        },
        onUploadError: function (id, xhr, status, message) {
            // Happens when an upload error happens
            ui_single_update_active(this, false);
            ui_single_update_status(this, 'Error: ' + message, 'danger');
        },
        onFallbackMode: function () {
            // When the browser doesn't support this plugin :(
            ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
        },
        onFileSizeError: function (file) {
            ui_single_update_status(this, 'File excess the size limit', 'danger');

            ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
        },
        onFileTypeError: function (file) {
            ui_single_update_status(this, 'File type is not an image', 'danger');

            ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (type error)', 'danger');
        },
        onFileExtError: function (file) {
            ui_single_update_status(this, 'File extension not allowed', 'danger');

            ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (extension error)', 'danger');
        }
    });
});