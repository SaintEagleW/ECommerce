<?php

namespace App\Enums;

enum ResetPasswordStatus: int
{
    case SUCCESS = 1;
    case USER_INEXISTED = 2;
    case INCORRECT_PASSWORD = 3;
}
