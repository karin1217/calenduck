<?php

namespace App\Http\Controllers;
ini_set('memory_limit',-1);
use App\Models\Product;
use App\Models\ProductAttributeName;
use App\Models\ProductAttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $_productSkus;
    private $_skuFileName = 'data/sku';
    private $_attrFileName = 'data/attr';
    private $_attributes;

    /**
     * 商品列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::paginate(30);
        return view('products.list', compact('products'));
    }

    /**
     * 商品详细
     *
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        $this->_skuFileName = $this->_skuFileName.$product->id;
        $this->_attrFileName = $this->_attrFileName.$product->id;


        if( ! Storage::disk('public')->exists($this->_skuFileName))
        {
            Storage::put($this->_skuFileName, '');
        }
//        $fileContents = Storage::get($this->_skuFileName);
//        $fileContents = json_decode($fileContents, true);
//        if( ! $fileContents )
//            $fileContents = [];
        $fileContents = [];

        foreach($product->productSkus as $key=>$productSku)
        {
            $attributeWrapper = explode(',',trim($productSku->sku, '[]'));

//            $mainKey = preg_replace('/\[|\]/','',$productSku->sku);
//            //$mainKey = substr($mainKey,0,1);
//            $mainKey = preg_replace('/\,|\:/','|',$mainKey);
            $mainKey = $productSku;
//            foreach ($attributeWrapper as $sk=>$attribute)
//            {
//                var_dump($attribute);
//                list($nameId, $valueId) = explode(':',$attribute);
//                $name = ProductAttributeName::name($nameId);
////                var_dump($name);
//                $value = ProductAttributeValue::value($valueId);
////                var_dump($value);
//
//                $this->_productSkus->attributes[$mainKey][$nameId][$valueId] = $value;
//                $this->_productSkus->names[$nameId]=$name;
//                $this->_productSkus->values[$nameId][$valueId] = $value;
//                $this->_productSkus->stocks[$mainKey] = $productSku->stocks;
//                $this->_productSkus->prices[$mainKey] = $productSku->price;



//            }

//            $fileContents['sku_list'][$product->id.'_'.$mainKey] = [
            if($productSku->stocks > 0) {
                $fileContents['sku_list'][] = [
                    'attrs' => $mainKey,
                    'stocks' => $productSku->stocks,
                    'price' => $productSku->price
                ];
            }

        }

        foreach($product->productAttributes as $key=>$attribute)
        {
            $this->_attributes[$attribute->attribute_name_id]['values_id'][] = $attribute->attribute_value_id;
            $this->_attributes[$attribute->attribute_name_id]['values'][] = ProductAttributeValue::value($attribute->attribute_value_id);
            $this->_attributes[$attribute->attribute_name_id]['name'] = ProductAttributeName::name($attribute->attribute_name_id);

            $this->_attributes[$attribute->attribute_name_id]['values_id'] = array_unique($this->_attributes[$attribute->attribute_name_id]['values_id']);
            $this->_attributes[$attribute->attribute_name_id]['values'] = array_unique($this->_attributes[$attribute->attribute_name_id]['values']);

        }
        $fileContents['attributes_list'] = $this->_attributes;

        Storage::put($this->_skuFileName, json_encode($fileContents));
        $skuFilters = $this->_productSkus;
        //dd($this->_productSkus);


//        if( ! Storage::disk('public')->exists($this->_attrFileName))
//        {
//            Storage::put($this->_attrFileName, '');
//        }
//        $contents = Storage::get($this->_skuFileName);
//        $contents = json_decode($contents, true);


//        $contents = $this->_attributes;
//        Storage::put($this->_attrFileName, json_encode($contents));

        //dd($this->_attributes);


//        foreach($product->productAttributes as $key=>$attribute)
//        {
//            $this->_attributes[$attribute->productAttributeName->name][$attribute->productAttributeValue->id] = [
//                'attributeNameId'=>$attribute->productAttributeName->id,
//                'attributeValueId'=>$attribute->productAttributeValue->id,
//                'attributeValue'=>$attribute->productAttributeValue->value
//            ];
//
//
//            //var_dump($attribute);
//        }

        //$skuFilters = $this->_attributes;
//        var_dump($skuFilters);exit;



        return view('products.show', compact('product','skuFilters'));
    }

    public function selectSku(Request $request, Product $product)
    {
        $stocks = $product->stocks($request->sku);


        if( ! $stocks )
            return false;

        return json_encode(['stocks'=>$stocks]);
    }
}
