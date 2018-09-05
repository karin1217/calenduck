$(document).ready(function () {
    /**----------------------------------
     *
     *       商品分类管理
     *
     *-----------------------------------*/

        //  添加二级分类


    var elRow = $($('.categories>.row')[0]).clone();
    var inputTopCat = elRow.find('.top-category>form>div>.input-group>input');

    $('.categories').on('click','.add-sub-category',function () {
        var addFlag = true;
        console.log($(this).data().pid);
        var pId = $(this).data().pid;
        var formId = '#sub-category-'+pId; //$(this).data().pid;
        var elForm = $(formId);
        var elDiv = elForm.find('div[class="form-group"]');

        console.log(elDiv);
        elDiv.each(function () {
            if ($.trim($(this).find('input').val()) === '') {
                addFlag = false;
                return false;
            }
        });
        if( ! addFlag ) return false;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/admin/product/categories/create",
            method: "POST",
            data: {'parent_id':pId},
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if(response.status === 'success') {
                    var el = $('#tmp-category').clone();
                    el.show();
                    el.find('input').val('').attr({'data-id':response.id,'data-pid':pId, 'id':'input-category-'+response.id, 'class':'form-control input-category'});
                    el.appendTo(elForm);
                    el.find('input').focus();

                    $(window).bind('beforeunload', function () {
                        return false;
                    });
                }

            },
            error: function () {
                console.log('Add category error');
            }
        });

        //console.log(elDiv[0]);

    }).on('click','.add-top-category',function () {     // 添加一级分类

        //console.log(elRow.find('.sub-category>form:first'));
        var elTmpSub = $(elRow.find('.sub-category>form').children('.form-group')[0]);

        // console.log();
        //elTmpSub.find('.input-group>input').val('');
        elRow.find('.sub-category>form').empty();//.prepend(elTmpSub);

        inputTopCat.val('').attr('data-id','');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/admin/product/categories/create",
            method: "POST",
            data: {'name':inputTopCat.val(),'parent_id':0},
            //processData: false,
            //contentType: false,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if(response.status === 'success') {
                    inputTopCat.attr({'data-id':response.id,'id':'input-category-'+response.id});
                    elRow.attr('class', 'row row-' + response.id);
                    elRow.find('div.sub-category>form').attr('id','sub-category-'+response.id);
                    elRow.find('div.sub-category>button.add-sub-category').attr('data-pid',response.id);
                    $('#op-row').before(elRow);
                    $(window).bind('beforeunload', function () {
                        return false;
                    });
                }

            },
            error: function () {
                console.log('Upload error');
            }
        });
    }).on('blur','.input-category',function () { //更新一级分类
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/admin/product/categories/update",
            method: "POST",
            data: {'name':$(this).val(), 'id': $(this).data().id},
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $(window).unbind('beforeunload');

            },
            error: function () {
                console.log('Update error');
            }
        });
    }).on('click','.del-category',function () { //删除分类
        var type = $(this).data().type;

        var id = $(this).prev().data().id;
        var $obj = $(this);

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/admin/product/categories/delete",
            method: "POST",
            data: {'id': id, 'type':type},
            dataType: 'json',
            beforeSend: function () {
                $obj.empty().append($('<img src="/images/loading.gif" />'));
            },
            success: function (response) {
                console.log(response);
                $obj.empty().append($('<i class="fas fa-minus"></i>'));
                if( response.status === 'success') {
                    if(type === 'top') {
                        $('.row-' + id).remove();
                    } else {
                        $obj.parent().parent().remove();
                    }
                }
                //$(window).unbind('beforeunload');

            },
            error: function () {
                console.log('Update error');
            }
        })
    });


    /**----------------------------------
     *
     *       商品分类管理
     *
     *-----------------------------------*/
});