<?php

namespace App\Repositories;

use App\Models\User as UserModel;
use App\Entities\User;

class UserRepository
{
    public function getUser(string $email): ?User
    {
        $row = UserModel::where('email', '=', $email)->first();

        if (is_null($row)) {
            return null;
        } else {
            return new User($row->email, $row->password);
        }
    }

    public function addUser(User $user)
    {
        $row = new UserModel();
        $row->email = $user->getEmail();
        $row->password = $user->getPassword();
        $row->nickname = $user->getNickname();
        $row->avatar_url = $user->getAvatarUrl();
        $row->save();
    }

    public function resetPassword(User $user)
    {
        $row = UserModel::where('email', $user->getEmail())->first();
        $row->password = $user->getPassword();
        $row->save();
    }
}
