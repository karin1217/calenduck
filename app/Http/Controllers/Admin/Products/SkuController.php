<?php

namespace App\Http\Controllers\Admin\Products;

use App\Handlers\ImageUploadHandler;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SkuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * 获取商品所有 SKU 信息
     *
     * @param Product $product
     * @return array
     */
    public function getSku(Product $product)
    {
        //var_dump($product);exit;

        if (!Auth::user()->can('manage_products')) {
            return [
                'code' => CODE_REQUEST_STATUS_FAILED,
                'status' => MSG_REQUEST_FAILED,
                'data' => json_decode(json_encode('{}')),
            ];
        }

        $productSku = $product->productSkus;

        if (!$productSku) {
            return [
                'code' => 102,
                'status' => '未找到图片相关信息',
                'data' => json_decode(json_encode('{}')),
            ];
        } else {

            return [
                'code' => CODE_REQUEST_STATUS_SUCCESS,
                'status' => MSG_REQUEST_SUCCESS,
                'data' =>  $productSku,
            ];
        }
    }

    /**
     *
     * 更新 SKU 图片
     *
     * @param Request $request
     * @param Product $product
     * @return array
     */
    public function uploadImage(Request $request, Product $product)
    {
        //var_dump($product);exit;

        if( ! Auth::user()->can('manage_products') )
        {
            return [
                'code'      =>  CODE_REQUEST_STATUS_FAILED,
                'status'    =>  MSG_REQUEST_FAILED,
                'data'      =>  json_decode(json_encode('{}')),
            ];
        }

        $imgHandler = ImageUploadHandler::getInstance();

        // 参数顺序：图片文件、要存储的文件夹名、图片名称前缀(2为商品图片)
        $handlerResult = $imgHandler->save($request->image, 'products', 2);

        if( ! $handlerResult ) {
            return [
                'code'      =>  101,
                'status'    =>  '图片保存失败',
                'data'      =>  json_decode(json_encode('{}')),
            ];
        } else {
            $productSku = ProductSku::where([
                ['product_id', '=', $product->id],
                ['sku', '=', $request->sku],
            ])->first();
            // 如果该 SKU 数据已经存在
            if( $productSku ) {
                ProductSku::where('id', $productSku->id)->update(['image' => $handlerResult['path']]);
            } else { // 如果不存在
                ProductSku::insert([
                    'product_id' => $product->id,
                    'sku' => $request->sku,
                    'price' => 0,
                    'stocks' => 0,
                    'image' => $handlerResult['path'],
                ]);

            }
            return [
                'code'      =>  CODE_REQUEST_STATUS_SUCCESS,
                'status'    =>  MSG_REQUEST_SUCCESS,
                'data'      =>  $handlerResult,
            ];
        }
    }

    public function update(Product $product, Request $request)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return [
                'code'      =>  CODE_REQUEST_STATUS_FAILED,
                'status'    =>  MSG_REQUEST_FAILED,
                'data'      =>  json_decode(json_encode('{}')),
            ];
        }

        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->introduction = $request->introduction;
        $product->save();

//        return $request->skuList;

        ProductSku::where('product_id', $product->id)->delete();

        //var_dump($request->skuList);exit;

        $data = [];
        $count = 0;
        $skuKeys = [];
        foreach($request->skuList as $sku=>$values) {
            $key = str_replace('-','|', $sku);
            $skuKeys[] = $sku;
            $data[$count]['sku'] = $key;
            $data[$count]['price'] = $values['price'];
            $data[$count]['stocks'] = $values['stocks'];
            $data[$count]['image'] = $values['image'] ? $values['image'] : NULL;
            $data[$count]['product_id'] = $product->id;
            $count ++;
        }

//        var_dump($data);exit;

        if( ProductSku::insert($data) ) {

            $attributeData = [];
            $count = 0;

            foreach($skuKeys as $attributeValues) {
                $values = explode('-', $attributeValues);

                //var_dump($values);exit;

                foreach ($values as $valueId) {
                    $nameId = ProductAttributeValue::name($valueId);
                    //var_dump($nameId);
                    $attributeData[$count]['product_id'] = $product->id;
                    $attributeData[$count]['attribute_name_id'] = $nameId;
                    $attributeData[$count]['attribute_value_id'] = $valueId;
                    $count ++;
                }
            }
//            var_dump($attributeData); exit;
            ProductAttribute::where('product_id',$product->id)->delete();

            ProductAttribute::insert($attributeData);


            return [
                'code'      =>  CODE_REQUEST_STATUS_SUCCESS,
                'status'    =>  MSG_REQUEST_SUCCESS,
                'data'      =>  json_decode(json_encode('{}')),
            ];

        } else {
            return [
                'code'      =>  101,
                'status'    =>  'SKU 更新失败',
                'data'      =>  json_decode(json_encode('{}')),
            ];
        }



    }



}
