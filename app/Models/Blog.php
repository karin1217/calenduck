<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     *
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];
    /**
     *
     * 关联博文所属用户
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
