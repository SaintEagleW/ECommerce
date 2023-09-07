<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Enums\RegisterStatus;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        $user_service = new UserService();
        $result = $user_service->register($email, $password, $passwordConfirm);

        if ($result === RegisterStatus::SUCCESS) {
            return response()->json(['message' => '註冊成功']);
        } elseif ($result === RegisterStatus::USER_EXIST) {
            return response()->json(['message' => '帳號已存在']);
        } else {
            return response()->json(['message' => '密碼不相符']);
        };
    }
}
