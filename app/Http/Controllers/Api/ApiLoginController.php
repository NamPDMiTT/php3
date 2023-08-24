<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Điều kiện validate
            $validators = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
                'remember_me' => 'boolean'
            ]);

            // Nếu validate không hợp lệ
            if ($validators->fails()) {
                return response()->json([
                    'status' => 'Failed',
                    'message' => $validators->errors()->first(),
                    'errors' => $validators->errors()->toArray()
                ]);
            }

            // Kiểm tra thông tin đăng nhập
            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json([
                    'status' => 'Failed',
                    'message' => 'Tài khoản hoặc mật khẩu không chính xác'
                ], 401);
            }

            // Lấy thông tin user
            $user = $request->user();
            // dd($user);

            // Tạo token
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            // Set thời gian sống của token
            // if ($request->remember_me) {
            //     $token->expires_at = now()->addWeeks(1);
            // }
            $token->expires_at = Carbon::now()->addMinute(1);
            $token->save();

            // Trả về phía client
            return response()->json([
                'status' => 'Success',
                'message' => 'Đăng nhập thành công',
                'data' => [
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
                ]
            ]);
        }
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        if ($request->isMethod('DELETE')) {
            // Xóa token hiện tại
            $request->user()->token()->revoke();

            // Trả về phía client
            return response()->json([
                'status' => 'Success',
                'message' => 'Đăng xuất thành công'
            ]);
        }
    }
}
