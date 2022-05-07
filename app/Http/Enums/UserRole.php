<?php


namespace App\Http\Enums;


class UserRole
{
    const ADMIN = 1;
    const USER = 0;

    public static function convert($role) {
        return $role ? 'admin' : 'user';
    }
}
