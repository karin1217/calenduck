<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['name', 'parent_id'];
    public $timestamps=false;

    public function topCategory()
    {
        return $this->where('parent_id',0)->get();

//        App\User::with(['posts' => function ($query) {
//            $query->where('title', 'like', '%first%');
//        }])->get();
    }

    public function subCategory($parentId)
    {
        return $this->where('parent_id',$parentId)->get();
    }
}
