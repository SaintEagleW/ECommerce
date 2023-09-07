<?php

namespace App\Entities;

use Illuminate\Support\Facades\Hash;

class User
{
    private int $id;
    private string $email;
    private string $password;
    private string $nickname;
    private string $avatarUrl;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->nickname = "New User";
        $this->avatarUrl = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlFTMGuIyhMG-qRebIqkem-UGSIv1SchiuVQ&usqp=CAU";
    }

    public function isPasswordMatch(string $password): bool
    {
        return Hash::check($password, $this->password);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function updatePassword(string $password): void
    {
        $this->password = $password;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    public function updateNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    public function updateAvatarUrl(string $avatarUrl): void
    {
        $this->avatarUrl = $avatarUrl;
    }
}
