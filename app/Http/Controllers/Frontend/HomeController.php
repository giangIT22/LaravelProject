<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SliderService;
use App\Services\ProductService;
// use App\Services\CartService;

class HomeController extends Controller
{   
    protected $sliderService;
    protected $productService;
    // protected $cartServices;
    
    public function __construct(SliderService $sliderService, ProductService $productService)
    {   
        $this->sliderService  = $sliderService;    
        $this->productService = $productService;
    }

    public function index(){        
        return view('frontend.home.index',[
            'sliderService'     => $this->sliderService->all(),
            'bestSell'          => $this->productService->bestSell(),
            'featureProducts'   => $this->productService->featureProducts(),
        ]);
    }
}
