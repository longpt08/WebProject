<?php


namespace App\Http\Enums;


class ProductStatus
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public static function convert($status): string
    {
        switch ($status) {
            case self::ACTIVE:
                return 'Active';
            case self::INACTIVE:
                return 'Inactive';
        }
        return '';
    }
}
