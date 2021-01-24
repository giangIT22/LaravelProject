<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()//đăng nhập 
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'errors' => [
                    'message' => 'Login failed!',
                    'status'  => false,
                    'code'    => 401,
                ]
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()//lấy ra thông tin của user vừa login
    {
        return response()->json(auth()->user());
    }

    public function refresh()//tạo mới token để duy trì phiên làm việc ko bị out 
    {
        try {
            return $this->respondWithToken(auth()->refresh());
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

    public function logout()//đăng xuất
    {
        auth()->logout();

        return response()->json([
            'code'    => 200,
            'status'  => true,
            'message' => 'Successfully logged out'
        ]);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }
}
