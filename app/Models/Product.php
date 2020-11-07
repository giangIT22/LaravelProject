<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function categories(){//1 sản phẩm chỉ thuộc 1 danh mục
        return $this->belongsToMany(Category::class);
    }
    
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
