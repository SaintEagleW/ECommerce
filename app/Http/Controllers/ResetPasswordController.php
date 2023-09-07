<?php

namespace App\Http\Controllers;

use App\Enums\ResetPasswordStatus;
use Illuminate\Http\Request;
use App\Services\UserService;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        $user_service = new UserService();
        $result = $user_service->resetPassword($email, $password, $passwordConfirm);

        if ($result === ResetPasswordStatus::SUCCESS) {
            return response()->json(['message' => '密碼變更成功', 'code' => ResetPasswordStatus::SUCCESS->value]);
        } elseif ($result === ResetPasswordStatus::INCORRECT_PASSWORD) {
            return response()->json(['message' => '密碼不相符']);
        } elseif ($result === ResetPasswordStatus::USER_INEXISTED) {
            return response()->json(['message' => '帳號不存在']);
        }
    }
}
