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

    public function get($limit = 5, array $orders = [], array $params = []) { //lấy ra tất cả dữ liệu 
        $query = Order::leftJoin('customers', 'customers.id', 'orders.customer_id');

        if($orders){
            $query->orderBy(...$orders);//...$order tác dụng giống như argument trong js , và nó sẽ chuyển đổi cái mảng
                                        //$order đấy thành dãy cái tham số dầu vào của hàm
        }
        return $query->paginate($limit);     
    }

    public function findById($id) {
        return Order::with('detail')
                ->leftJoin('customers', 'customers.id', 'orders.customer_id')
                ->where('orders.id', $id)
                ->select(
                    'orders.*',
                    'customers.name',
                    'customers.email',
                    'customers.phone',
                    'customers.address'
                )->get();//relation order vs orderDetail, phải relation giữa các model r thì mới
                                                                //dùng được method with
    }
}