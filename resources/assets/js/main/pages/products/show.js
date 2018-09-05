$(document).ready(function () {
    /** ---------------------------------------------------------------------------------------------
     *
     * 图片展示及放大镜
     *
     * ----------------------------------------------------------------------------------------------*/
    // $('.flexslider').flexslider({
    //     animation: "slide",
    //     controlNav: "thumbnails",
    //     customDirectionNav: $(".custom-navigation a"),
    //     initDelay:100000000000,
    //     touch: false,
    //     itemWidth: 400
    //     //itemMargin: 5
    // });

    //放大镜实现js
    $(".jqzoom").jqueryzoom({
        xzoom: 200, //放大图的宽度(默认是 200)
        yzoom: 200, //放大图的高度(默认是 200)
        offset: 10, //离原图的距离(默认是 10)
        position: "right", //放大图的定位(默认是 "right")
        preload: 1,
        zoomdiv: $('#zoom-zone')
    });

    //底部图片hover切换实现js
    $('.b_container img').hover(function(){
        $('.jqzoom img').attr('src',$(this).attr('src'));
        $('.jqzoom img').attr('jqimg',$(this).attr('src'));
    },function(){
        $.noop();
    });
    /** ---------------------------------------------------------------------------------------------
     *
     * 图片展示及放大镜
     *
     * ----------------------------------------------------------------------------------------------*/


    /** ---------------------------------------------------------------------------------------------
     *
     * SKU展示
     *
     * ----------------------------------------------------------------------------------------------*/
    console.log($('.add-to').length);
    if($('.add-to').length !== 0) {
        $.ajax({
            url: "/storage/data/sku" + $('.add-to').data().id,//json文件位置
            type: "GET",//请求方式为get
            dataType: 'json', //返回数据格式为json
            success: function (content) {//请求成功完成后要执行的方法
                // var key = '10_' + str;
                // if(content[key] === undefined) {
                //     console.log('he');
                //     return false;
                // }
                // $('.stocks>span').empty().text(content[key].stocks);
                // $('.add-to').empty().text('¥'+content[key].price);


                //console.log(content['10_1123'].stocks);
                var attributes = content.attributes_list;

                var sku_list = content.sku_list;

                console.log('Attributes',attributes);
                console.log('SKU LIST',sku_list);


                /**
                 * 属性集
                 * 下面一共有4个属性
                 * 属性item1 下面有 2个属性值 分别是 10,11
                 * （举个常见的例子 属性尺码 下有 S M L XL 4个属性值 ）
                 */
                var keys = {
                    'attr1':['10','11'],
                    'attr2':['20','21','22','23'],
                    'attr3':['30','31','32'],
                    'attr4':['40','41']
                };
                //SKU，Stock Keeping Uint(库存量单位)
                // var sku_list=[
                //     {'attrs':'10|20|11|40','stocks':120},
                //     {'attrs':'10|21|30|40','stocks':10},
                //     {'attrs':'10|22|30|40','stocks':28},
                //     {'attrs':'10|22|31|41','stocks':220},
                //     {'attrs':'10|22|32|40','stocks':130},
                //     {'attrs':'11|23|32|41','stocks':120},
                // ];

                /**init start */

                var k, k2, _attr_id, _attr_value, attr_length;
                var _attr, _all_ids_in;

                //显示html结构
                function show_attr_item() {
                    var html = '';
                    var count=0;
                    for (k in attributes) {
                        html += '<div class="product-attr" > <span class="label">' + attributes[k].name + '</span>';
                        html += '<ul>'
                        for (k2 in attributes[k].values) {
                            _attr_id = attributes[k].values_id[k2];
                            _attr_value = attributes[k].values[k2];
                            html += '<li class="text" val="' + _attr_id + '" >';
                            html += '<span>' + _attr_value + '</span>';
                            html += '<s></s>';
                            html += '</li>'
                        }
                        html += '</ul>';
                        html += '</div>';
                        count ++;
                    }
                    attr_length = count;
                    $('#panel-sel').html(html);
                }

                //显示数据
                function show_data(sku_list) {
                    var str = "";
                    for (k in sku_list) {
                        str += sku_list[k]['attrs']['sku'] + "\t" + sku_list[k]['stocks'] + "\n";
                    }
                    $('#panel_sku_list pre').html(str);
                }

                show_data(sku_list);
                console.log('HELLOOOOOOOOO');
                show_attr_item();


                /**init end */

                //获取所有包含指定节点的路线
                function filterProduct(ids) {
                    var result = [];
                    $(sku_list).each(function (k, v) {
                        console.log('SKU LIST V:', v);
                        _attr = '|' + v['attrs']['sku'] + '|';
                        _all_ids_in = true;
                        for (k in ids) {
                            if (_attr.indexOf('|' + ids[k] + '|') == -1) {
                                _all_ids_in = false;
                                break;
                            }
                        }
                        if (_all_ids_in) {
                            result.push(v);
                        }

                    });
                    console.log("RESULT:",result);
                    return result;
                }

                //获取 经过已选节点 所有线路上的全部节点
                // 根据已经选择得属性值，得到余下还能选择的属性值
                function filterAttrs(ids) {
                    var products = filterProduct(ids);
                    //console.log(products);
                    var result = [];
                    $(products).each(function (k, v) {
                        result = result.concat(v['attrs']['sku'].split('|'));

                    });
                    return result;
                }

                //已选择的节点数组
                function _getSelAttrId() {

                    var list = [];
                    $('.product-attr li.sel').each(function () {
                        list.push($(this).attr('val'));
                        console.log(list);
                    });
                    return list;
                }

                $('.product-attr li').on('click', function () {
                    if ($(this).hasClass('b')) {
                        return;//被锁定了
                    }
                    if ($(this).hasClass('sel')) {
                        $(this).removeClass('sel');
                        $(this).find('i[class="sel"]').remove();
                    } else {
                        $(this).siblings().removeClass('sel');
                        $(this).siblings().find('i[class="sel"]').remove();
                        $(this).addClass('sel');
                        $(this).append($('<i class="sel"></i>'));

                    }
                    var select_ids = _getSelAttrId();

                    //已经选择了的规格
                    var $_sel_product_attr = $('li.sel').parents('.product-attr');

                    // step 1
                    var all_ids = filterAttrs(select_ids);
                    //console.log(all_ids);

                    //获取未选择的
                    var $other_notsel_attr = $('.product-attr').not($_sel_product_attr);

                    //设置为选择属性中的不可选节点
                    $other_notsel_attr.each(function () {
                        set_block($(this), all_ids);

                    });

                    //step 2
                    //设置已选节点的同级节点是否可选
                    var count = 0;
                    var sel_key = [];
                    $_sel_product_attr.each(function () {
                        // console.log('-------------------------');
                        // console.log(update_2($(this))[0]);
                        // console.log('-------------------------')
                        sel_key=update_2($(this));//.push(update_2($(this))[0]);
                        // console.log(sel_key);
                        count++;
                        console.log("COUNT:",count);

                        console.log('attr_length=', attr_length);
                        if (count === parseInt(attr_length)) {
                            console.log('All selected!');
                            //console.log(test);
                            var str_key = sel_key.join('|');
                            console.log(str_key);

                            // var sku;
                            $.each(sku_list, function (key, sku) {
                                //console.log('SEL PRODUCT ATTR-SKU:',sku);
                                // $.each(sku,function(name, value){
                                //     if(name === 'attrs' && value === str) {
                                if (sku.attrs.sku === str_key) {
                                    $('.stocks>span').empty().text(sku.attrs.stocks);
                                    $('.add-to').empty().text('¥' + sku.attrs.price);
                                }
                                //     }
                                // });
                            });
                            //console.log($.inArray({"attrs":test.join('|')}, sku_list));
                        } else {
                            $('.add-to').empty().text($('.add-to-backup').text());
                            $('.stocks>span').empty().text($('.stocks-backup').text());
                        }
                    });

                });

                function update_2($product_attr) {
                    // 若该属性值 $li 是未选中状态的话，设置同级的其他属性是否可选
                    var select_ids = _getSelAttrId();
                    console.log('-------------------------');
                    console.log('      select_ids');
                    console.log('-------------------------');
                    console.log(select_ids);
                    console.log('-------------------------');

                    var $li = $product_attr.find('li.sel');

                    var select_ids2 = del_array_val(select_ids, $li.attr('val'));
                    //console.log(select_ids2);
                    console.log('-------------------------');
                    console.log('      select_ids2');
                    console.log('-------------------------');
                    console.log(select_ids2);
                    console.log('-------------------------');

                    var all_ids = filterAttrs(select_ids2);
                    //console.log(all_ids);

                    set_block($product_attr, all_ids);

                    return select_ids2;
                }

                function set_block($product_attr, all_ids) {

                    //根据 $product-attr下的所有节点是否在可选节点中（all_ids） 来设置可选状态
                    $product_attr.find('li').each(function (k2, li2) {

                        if ($.inArray($(li2).attr('val'), all_ids) == -1) {
                            $(li2).addClass('b');
                        } else {
                            $(li2).removeClass('b');
                        }

                    });

                }

                function del_array_val(arr, val) {
                    //去除 数组 arr中的 val ，返回一个新数组
                    var a = [];
                    console.log('-------------------------');
                    console.log('      arr');
                    console.log('-------------------------');
                    console.log(arr);
                    console.log('-------------------------');
                    var ak;
                    for (ak in arr) {
                        if (arr[ak] !== val || ak <= 0) {
                            a.push(arr[ak]);
                        }
                    }
                    return a;
                }


                $('.product-attr li')[0].click();

                return false;
            } // end ajax request success
        });  //end ajax
    }
    /** ----------------------------------------------------------------------------------------------
     *
     * SKU展示
     *
     * ----------------------------------------------------------------------------------------------*/
});
