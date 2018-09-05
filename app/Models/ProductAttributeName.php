<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeName extends Model
{
    public $timestamps = false;

    public static function name($id)
    {
        return ProductAttributeName::where('id',$id)->pluck('name')->first();
    }

    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class, 'name_id', 'id');
    }
}
