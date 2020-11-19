<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function show($productId){
        $product = $this->productService->findById($productId);

        if(!$product){
            abort(404);
        }
        return view('frontend.products.show',[
            'product' => $product
        ]);
    }
}
