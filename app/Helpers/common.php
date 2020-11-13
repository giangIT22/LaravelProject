<?php

use App\Services\CartService;
if(!function_exists('totalCart')){
    function totalCart(){
        return app(CartService::class)->total();
    }
}