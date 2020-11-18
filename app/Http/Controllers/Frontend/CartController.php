<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\CustomerService;
use App\Services\OrderService;
use App\Services\OrderDetailService;
use Exception;

class CartController extends Controller
{
    protected $cartService;
    protected $customerService;
    protected $orderService;
    protected $orderDetailService;

    public function __construct(CartService $cartService, CustomerService $customerService, 
        OrderService $orderService, OrderDetailService $orderDetailService)
    {
        $this->cartService          = $cartService;
        $this->customerService      = $customerService;
        $this->orderService         = $orderService;
        $this->orderDetailService   = $orderDetailService;
    }   


    public function store($productId){
        $cart = $this->cartService->store($productId);
        return redirect()->to(route('frontend.home'));
    }

    public function index(){
        $products = $this->cartService->all();

        return view('frontend.carts.index',[
            'products' => $products
        ]);
    }

    public function destroy($productId){
        $this->cartService->delete($productId);

        return redirect()->to(route('frontend.cart.index')); //<=> header('location:')
    }

    public function update(Request $request){
        $this->cartService->update($request->qty);
        return redirect()->to(route('frontend.cart.index'));
    }

    public function checkout(Request $request){
        try{
            if(empty(session()->get('cart'))){
                return response()->json([
                    'status' => false
                ]);
            }

            $customer       = $this->customerService->save($request->all()); //thêm customer
            $order          = $this->orderService->save(['customer_id' => $customer->id]);//thêm order cho customer
            $products       = session()->get('cart');

            $this->orderDetailService->save($order->id, $products);//thêm chi tiết order những sản phẩm 
                                                                    //khách hàng đã mua

            session()->forget('cart');//xóa sesstion 

            return response()->json([ 
               'message' => 'success',
               'status'  => true
            ]);

        }catch(Exception $e){
            return response()->json([
               'message' => $e->getMessage(),
               'status'  =>false
             ]);
        }
    }
}
