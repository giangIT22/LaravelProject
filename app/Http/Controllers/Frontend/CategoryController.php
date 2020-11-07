<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\ProductService;

class CategoryController extends Controller
{
    protected $CategoryService;
    protected $productService;

    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->CategoryService = $categoryService;
        $this->productService  = $productService; 
    }

    public function show($slug){ // $slug chính là bằng cái tham số {slug} ở trên route
        $category = $this->CategoryService->findBySlug($slug);        
        $featureProducts = $this->productService->getProductsByIdCategory($category->id);  
        return view('frontend.categories.show',[
            'headTitle'             => $category->name,
            'featureProducts'       => $featureProducts
        ]);
    }
}
