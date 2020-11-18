<?php

namespace App\Services;
use App\Models\Order;

class OrderService
{
    public function save($input, $id = null){
        return Order::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'code'      => rand(1000, 100000),
                'customer_id'     => $input['customer_id'],
            ],
        );
    }
}