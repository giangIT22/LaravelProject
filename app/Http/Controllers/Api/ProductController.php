<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductSaveRequest;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        try {

            $orders   = [$request->column, $request->sort];            
            $products = $this->productService->get(10, array_filter($orders));

            return response()->json([
                'code'   => 200,
                'status' => true,
                'data'   => [
                    'products' => $products->items(),
                    'meta' => [
                        'total' => $products->total(),
                        'current_page' => $products->currentPage(),
                        'per_page' => $products->perPage(),
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

    public function store(ProductSaveRequest $request)
    {
        try {
            $product = $this->productService->save($request->only(
                'name',
                'slug',
                'price',
                'image',
                'is_feature',
                'meta_title',
                'meta_desc',
                'keyword'
            ));

            if ($request->category_ids) {
                $this->productService->attachCategory($product, $request->category_ids);//cái này dùng
                        //để thêm sản phẩm theo danh mục, dưới phần update tương tự
            }

            return response()->json([
                'code'   => 200,
                'status' => true,
                'data'   => $product
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

    public function update($id, ProductSaveRequest $request)
    {
        try {
            $product = $this->productService->save($request->only(
                'name',
                'slug',
                'price',
                'image',
                'is_feature',
                'meta_title',
                'meta_desc',
                'keyword'
            ), $id);

            if ($request->category_ids) {
                $this->productService->attachCategory($product, $request->category_ids);
            }

            return response()->json([
                'code'   => 200,
                'status' => true,
                'data'   => $product
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

    public function destroy($id)
    {
        try {
            return response()->json([
                'code'    => 200,
                'status'  => true,
                'deleted' => $this->productService->delete([$id]),
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
