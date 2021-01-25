<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
    	try {
            // return response()->json([
	        // 	'data' => $request->all()
	        // ]);	

	    	$file = $request->file('image')->store('public/images'); //lấy ra input file image qua đối tượng request và lưu vào đường dẫn mà chúng ta quy định trong config

	        return response()->json([
	        	'successfully' => true,
	            'url' => Storage::disk(config('filesystems.disks.local.driver'))->url($file),//lấy ra đường dẫn của file ảnh
	        ]);	//phải chạy lệnh php artisan storage:link mới đọc được ảnh, đọc được mới hiển thị ảnh đc
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