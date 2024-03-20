<?php

namespace App\Enums;

enum UserTypeEnum : string
{
    case ADMIN = 'admin';

    case USER = 'user';

    case DESIGNER = 'designer';
}
