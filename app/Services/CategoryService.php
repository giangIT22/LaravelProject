<?php

namespace App\Services;
use App\Models\Category;

class CategoryService {
    public function get($limit = 2, array $orders = [], array $params = []) {
        $query = Category::query();
        
        if($orders){
            $query->orderBy(...$orders);//...$order tác dụng giống như argument trong js , và nó sẽ chuyển đổi cái mảng
                                        //$order đấy thành dãy cái tham số dầu vào của hàm
        }
        return $query->paginate($limit);  //trả về 1 đôi tượng   
    }

    public function all($limit = 3){
        return Category::limit($limit)->get();
    }

    public function findBySlug($slug){
        return Category::where('slug', $slug)->first();
    }

    public function findById($id){
        return Category::where('id', $id)->first();
    }

    public function save(array $input, $id = null){
       return Category::updateOrCreate(
            ['id' => $id],
            [
                'name'         => $input['name'], 
                'slug'         => $input['slug'],
                'meta_title'   => $input['meta_title'],
                'meta_desc'    => $input['meta_desc'],
                'meta_keyword' => $input['meta_keyword'],
            ]
        );
    }

    public function delete($ids) {
        return Category::destroy(...$ids);
    }

}