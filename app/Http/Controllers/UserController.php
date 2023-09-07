<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Enums\RegisterStatus;
use App\Enums\ResetPasswordStatus;

class UserController extends Controller
{
    private UserService $user_service;

    public function __construct()
    {
        $this->user_service = new UserService();
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        // $user_service = new UserService();
        $is_success = $this->user_service->login($email, $password);

        if ($is_success) {
            // $this->getProfile($email);
            return response()->json(['message' => '登入成功', 'code' => 1]);
        } else {
            return response()->json(['message' => '登入失敗', 'code' => 2]);
        }
    }

    public function register(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        // $user_service = new UserService();
        $result = $this->user_service->register($email, $password, $passwordConfirm);

        if ($result === RegisterStatus::SUCCESS) {
            return response()->json(['message' => '註冊成功']);
        } elseif ($result === RegisterStatus::USER_EXIST) {
            return response()->json(['message' => '帳號已存在']);
        } else {
            return response()->json(['message' => '密碼不相符']);
        };
    }

    public function resetPassword(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        // $user_service = new UserService();
        $result = $this->user_service->resetPassword($email, $password, $passwordConfirm);

        if ($result === ResetPasswordStatus::SUCCESS) {
            return response()->json(['message' => '密碼變更成功', 'code' => ResetPasswordStatus::SUCCESS->value]);
        } elseif ($result === ResetPasswordStatus::INCORRECT_PASSWORD) {
            return response()->json(['message' => '密碼不相符']);
        } elseif ($result === ResetPasswordStatus::USER_INEXISTED) {
            return response()->json(['message' => '帳號不存在']);
        }
    }

    public function getProfile(Request $request)
    {
        // $user_service = new UserService();
        $email = $request->input('email');
        $user = $this->user_service->getProfile($email);
        return response()->json([
            'email' => $user->getEmail(),
            'nickname' => $user->getNickname(),
            'avatarUrl' => $user->getAvatarUrl()
        ]);
    }
}
