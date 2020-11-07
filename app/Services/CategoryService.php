<?php

namespace App\Services;
use App\Models\Category;

class CategoryService {
    public function all($limit = 3){
        return Category::limit($limit)->get();
    }

    public function findBySlug($slug){
        return Category::where('slug', $slug)->first();
    }

}