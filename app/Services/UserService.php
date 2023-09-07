<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Enums\RegisterStatus;
use App\Enums\ResetPasswordStatus;
use App\Entities\User;

class UserService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->userRepository->getUser($email);
        return $user->isPasswordMatch($password);
    }

    public function register(string $email, string $password, string $passwordConfirm)
    {
        if (!$this->isPasswordCorrect($password, $passwordConfirm)) {
            return RegisterStatus::INCORRECT_PASSWORD;
        }

        if ($this->isUserExist($email)) {
            return RegisterStatus::USER_EXIST;
        }

        $this->registerUser($email, $password);
        return RegisterStatus::SUCCESS;
    }

    private function isPasswordCorrect(string $password, string $passwordConfirm): bool
    {
        return $password === $passwordConfirm;
    }

    private function isUserExist(string $email): bool
    {
        $user = $this->userRepository->getUser($email);
        return !is_null($user);
    }

    private function registerUser(string $email, string $password): void
    {
        $user = new User($email, $password);
        $this->userRepository->addUser($user);
    }

    public function resetPassword(string $email, string $password, string $passwordConfirm)
    {
        if (!$this->isPasswordCorrect($password, $passwordConfirm)) {
            return ResetPasswordStatus::INCORRECT_PASSWORD;
        }

        if (!$this->isUserExist($email)) {
            return ResetPasswordStatus::USER_INEXISTED;
        }

        $user = $this->userRepository->getUser($email);
        $user->updatePassword($password);
        $this->userRepository->resetPassword($user);
        return ResetPasswordStatus::SUCCESS;
    }

    public function getProfile(string $email): User
    {
        return $this->userRepository->getUser($email);
    }
}
