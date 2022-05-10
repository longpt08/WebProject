<?php

namespace App\Http\Enums;

class UserRole
{
    const ADMIN = 1;
    const USER = 0;
    const STAFF = 2;

    public static function convert($role)
    {
        switch ($role) {
            case self::USER:
                return 'User';
            case self::ADMIN:
                return 'Admin';
            case self::STAFF:
                return 'Staff';
        }
    }
}
