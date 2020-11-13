<?php

namespace App\Services;
use App\Models\Product;

class ProductService{
    public function bestSell(){
        return Product::join('order_details', 'order_details.product_id', 'products.id')
                        ->selectRaw('sum(qty) as qty')
                        ->groupBy(['product_id'])
                        ->addSelect('product_id', 'products.name', 'products.image', 'products.price')
                        ->orderBy('qty', 'desc')
                        ->limit(4)->get();
    }

    public function featureProducts($limit = 8){
        return Product::where('is_feature', true)->limit($limit)->get();
    }

    public function getProductsByIdCategory($categoryId){
        return Product::join('category_product', 'category_product.product_id', 'products.id')
                        ->where('category_product.category_id', $categoryId)->get();
    }

    public function findById($id){
        return Product::find($id);
    }

}