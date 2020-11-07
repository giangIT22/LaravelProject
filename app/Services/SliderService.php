<?php

namespace App\Services;
use App\Models\Slider;

class SliderService {
    public function all($limit = 3){
        return Slider::limit($limit)->get();
    }
}