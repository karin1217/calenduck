<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    public function productAttributeName()
    {
        return $this->hasOne(ProductAttributeName::class, 'id', 'attribute_name_id');
    }

    public function productAttributeValue()
    {
        return $this->hasOne(ProductAttributeValue::class, 'id', 'attribute_value_id');
    }
}
