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
                return 'Người dùng';
            case self::ADMIN:
                return 'Quản lý';
            case self::STAFF:
                return 'Nhân viên';
        }
    }
}
