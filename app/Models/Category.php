<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function products(){//1 danh mục có nhiều sản phẩm
        return $this->belongsToMany(Product::class);
    }
}
