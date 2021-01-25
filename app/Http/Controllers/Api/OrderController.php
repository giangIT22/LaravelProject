<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {   
        $this->orderService = $orderService;
    }

    public function index(Request $request) { //lấy ra danh sách order tương ứng với khách hàng
        try {

            $orders   = [$request->column, $request->sort];            
            $orderList = $this->orderService->get(3, array_filter($orders));

            return response()->json([
                'code'   => 200,
                'status' => true,
                'data'   => [
                    'products' => $orderList->items(),
                    'meta' => [
                        'total' => $orderList->total(),
                        'current_page' => $orderList->currentPage(),
                        'per_page' => $orderList->perPage(),
                    ]
                ]
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'errors' => [
                    'message' => $e->getMessage(),
                    'status'  => false,
                    'code'    => 500,
                ]
            ]);
        }
    }

    public function show($id) {//show ra chi tiết order
        try {
            $order = $this->orderService->findById($id);
            return response()->json([
                'code'   => 200,
                'status' => true,
                'data'   => $order
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'errors' => [
                    'message' => $e->getMessage(),
                    'status'  => false,
                    'code'    => 500,
                ]
            ]);
        }
    }
}
