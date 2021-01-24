<?php

namespace App\Services;
use App\Models\Product;

class ProductService{

    public function get($limit = 2, array $orders = [], array $params = []) {
        $query = Product::query();
        
        if($orders){
            $query->orderBy(...$orders);//...$order tác dụng giống như argument trong js , và nó sẽ chuyển đổi cái mảng
                                        //$order đấy thành dãy cái tham số dầu vào của hàm
        }
        return $query->paginate($limit);     
    }

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


    public function save(array $input, $id = null){// thêm sản phẩm
        return Product::updateOrCreate(
             ['id' => $id],
             [
                 'name'         => $input['name'], 
                 'slug'         => $input['slug'],
                 'price'        => $input['price'],
                 'image'        => $input['image'] ?? null,
                 'is_feature'   => $input['is_feature'] ?? 0,
                 'meta_title'   => $input['meta_title'],
                 'meta_desc'    => $input['meta_desc'],
                 'keyword'      => $input['keyword'],
             ]
         ); 
    }

    public function delete(array $ids) {
        return Product::destroy(...$ids);
    }

    public function attachCategory(Product $product, $categoryIds)
    {
        $product->categories()->sync($categoryIds);
    }
}