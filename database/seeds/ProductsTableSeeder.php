<?php

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\ProductAttribute;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 商品示例图片范围
        $range = range(1, 11);
        // 商品图片地址
        foreach ($range as $index) {
            $images[] = '/images/main/pic'.$index.'.jpg';
        }

        $attributeNames = [
            ['name' => '颜色', 'category_id' => 2],
            ['name' => '尺码', 'category_id' => 2],
            ['name' => '品牌', 'category_id' => 2],
        ];
        \App\Models\ProductAttributeName::insert($attributeNames);

        foreach ($attributeNames as $key=> $attributeName)
        {
            if($attributeName['name'] == '颜色') {
                $attributeColors = [
                    ['value' => '军绿色', 'name_id' => $key+1 ],
                    ['value' => '花色', 'name_id' => $key+1 ],
                    ['value' => '蓝色', 'name_id' => $key+1 ],
                    ['value' => '褐色', 'name_id' => $key+1 ],
                    ['value' => '黄色', 'name_id' => $key+1 ],
                    ['value' => '黑色', 'name_id' => $key+1 ],
                ];
                \App\Models\ProductAttributeValue::insert($attributeColors);
            } elseif($attributeName['name'] == '尺码') {
                $attributeSizes = [
                    ['value' => 'XXS', 'name_id' => $key+1 ],
                    ['value' => 'XS', 'name_id' => $key+1 ],
                    ['value' => 'S', 'name_id' => $key+1 ],
                    ['value' => 'M', 'name_id' => $key+1 ],
                    ['value' => 'L', 'name_id' => $key+1 ],
                    ['value' => 'XL', 'name_id' => $key+1 ],
                ];
                \App\Models\ProductAttributeValue::insert($attributeSizes);
            } elseif($attributeName['name'] == '品牌') {
                $attributeBrands = [
                    ['value' => 'LOUIS VUITTON', 'name_id' => $key+1 ],
                    ['value' => 'GUCCI', 'name_id' => $key+1 ],
                    ['value' => 'GIVENCHY', 'name_id' => $key+1 ],
                ];
                \App\Models\ProductAttributeValue::insert($attributeBrands);
            }
        }

        // 所有分类 (顶级分类除外) ID 数组，如：[1,2,3,4]
        $category_ids = ProductCategory::where('parent_id','<>',0)->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $products = factory(Product::class)->times(100)->make()->each(function ($product) use ($faker, $images, $category_ids) {

            $product->image = $faker->randomElement($images);
            $product->category_id = $faker->randomElement($category_ids);
        });

        Product::insert($products->toArray());


        $skus = [];
        foreach($products as $key=>$product)
        {
            $product->id = $key+1;

            // 商品属性
            foreach($attributeColors as $attributeColor) {
                $color = \App\Models\ProductAttributeValue::where('value',$attributeColor['value'])->first();
                $productAttributes[] = [
                    'product_id' => $product->id,
                    'attribute_name_id' => $color->name_id,
                    'attribute_value_id' => $color->id,
                ];
            }
            ProductAttribute::insert($productAttributes);
            unset($productAttributes);

            foreach ($attributeSizes as $attributeSize) {
                $size = \App\Models\ProductAttributeValue::where('value',$attributeSize['value'])->first();
                $productAttributes[] = [
                    'product_id' => $product->id,
                    'attribute_name_id' => $size->name_id,
                    'attribute_value_id' => $size->id,
                ];
            }
            ProductAttribute::insert($productAttributes);
            unset($productAttributes);

            foreach ($attributeBrands as $attributeBrand) {
                $brand = \App\Models\ProductAttributeValue::where('value',$attributeBrand['value'])->first();
                $productAttributes[] = [
                    'product_id' => $product->id,
                    'attribute_name_id' => $brand->name_id,
                    'attribute_value_id' => $brand->id,
                ];
            }
            ProductAttribute::insert($productAttributes);
            unset($productAttributes);





            // 商品 SKU 种类
            $skuLines = random_int(1, 6);
            $addedColorIds = [];
            for($i=0; $i<$skuLines; $i++)
            {
                do {
                    $colorKey = rand(0,5);
                } while ( in_array($colorKey, $addedColorIds) );

                $color = \App\Models\ProductAttributeValue::where('value',$attributeColors[$colorKey]['value'])->first();
                array_push($addedColorIds, $colorKey);

//                $productAttributes[0] = [
//                    'product_id' => $product->id,
//                    'attribute_name_id' => $color->name_id,
//                    'attribute_value_id' => $color->id,
//                ];

                $sizeKey = rand(0,5);
                $size = \App\Models\ProductAttributeValue::where('value',$attributeSizes[$sizeKey]['value'])->first();
//                $productAttributes[1] = [
//                    'product_id' => $product->id,
//                    'attribute_name_id' => $size->name_id,
//                    'attribute_value_id' => $size->id,
//                ];

                $brandKey = rand(0,2);
                $brand = \App\Models\ProductAttributeValue::where('value',$attributeBrands[$brandKey]['value'])->first();
//                $productAttributes[2] = [
//                    'product_id' => $product->id,
//                    'attribute_name_id' => $brand->name_id,
//                    'attribute_value_id' => $brand->id,
//                ];
//                ProductAttribute::insert($productAttributes);

                //`product_id`, `sku`, `price`, `stocks`, `sku_sales`
                $skus[$key][$i]['product_id'] = $key+1;
                $skus[$key][$i]['sku'] = $color->id.'|'.$size->id.'|'.$brand->id;
                $skus[$key][$i]['price'] = rand(30, 9999);
                $skus[$key][$i]['stocks'] = rand(100,1000);

                ProductSku::insert($skus[$key][$i]);
            }

            unset($addedColorIds);



        }

    }
}
