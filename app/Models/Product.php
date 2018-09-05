<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'name', 'introduction'
    ];

    public function productSkus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * 获取商品SKU中的最低价格
     *
     * @return mixed
     */
    public function minPrice()
    {
        return min(ProductSku::where('product_id',$this->id)->pluck('price')->toArray());
    }

    public function maxPrice()
    {
        return max(ProductSku::where('product_id',$this->id)->pluck('price')->toArray());
    }

    public function totalStocks()
    {
        return array_sum(ProductSku::where('product_id',$this->id)->pluck('stocks')->toArray());
//        return $this->sku()->where('sku',$sku)->first();
    }
}
