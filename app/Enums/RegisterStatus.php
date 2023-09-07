<?php

namespace App\Enums;

enum RegisterStatus
{
    case SUCCESS;
    case USER_EXIST;
    case INCORRECT_PASSWORD;
}
