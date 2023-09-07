<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user_service = new UserService();
        $is_success = $user_service->login($email, $password);

        if ($is_success) {
            return response()->json(['message' => '登入成功']);
        } else {
            return response()->json(['message' => '登入失敗']);
        }
    }
}
