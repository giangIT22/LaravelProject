<?php

namespace App\Services;
use App\Models\Product;

class CartService {
    public function store($productId){
        $product = Product::find($productId);
        $cart    = session()->get('cart') ?? collect();

        if($cart->count() === 0){
            $product->qty = 1;
            $cart->push($product);
        }
        else{
            $checkExit = $cart->where('id', $product)->count();

            if($checkExit === 0){
                $product->qty = 1;
                $cart->push($product);
            }else{
                foreach($cart as $item){
                    if($item->id == 2){
                         $item->qty += 1;
                    }
                }
            }
        }
        session()->put('cart', $cart);
    }

    public function total(){
        $total = 0;
        $cart    = session()->get('cart') ?? collect();

        foreach($cart as $item){
            $total += $item->qty;
        }

        return $total;
    }
}