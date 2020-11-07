<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $name = 'giang';
        $email = 'long';
        $htmlElement = "<strong>hello</strong>";
        // return view('frontend.products.index')
        //         ->with('name', $name)
        //         ->with('email', $email);//truyền dữ liệu từ controller ra view bằng method with()

        // return view('frontend.products.index', compact('name', 'email'));//truyền dữ liệu từ controller ra view bằng method compact

        return view('frontend.products.index',[
            'name' => $name,
            'email'=> $email,
            'htmlElement' => $htmlElement
        ]);//truyền dữ liệu từ controller ra view bằng mảng , đây là cách hay dùng nhất
    }

    public function show(){
        $menus =[
            'home',
            'about',
            'contact'
        ];

        return view('frontend.products.show_child',[
            'menus' => $menus
        ]);
    }
}
