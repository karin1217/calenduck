<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
