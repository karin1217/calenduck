<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    public $timestamps = false;

    public static function value($id)
    {
        return ProductAttributeValue::where('id',$id)->pluck('value')->first();
    }

    public static function name($id)
    {
        return ProductAttributeValue::where('id',$id)->pluck('name_id')->first();
    }

    public function names()
    {
        return $this->belongsTo(ProductAttributeName::class, 'id','name_id');
    }
}
