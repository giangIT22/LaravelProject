<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function detail(){
        return $this->hasOne(OrderDetail::class);
    }
}
