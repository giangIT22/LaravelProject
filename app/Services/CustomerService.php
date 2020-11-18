<?php

namespace App\Services;
use App\Models\Customer;

class CustomerService
{
    public function save($input){
        return Customer::updateOrCreate(//hàm này trả về 1 object
            [
                'phone' => $input['phone']
            ],
            [
                'name'      => $input['name'],
                'phone'     => $input['phone'],
                'email'     => $input['email'],
                'address'   => $input['address']
            ],
        );
    }
}