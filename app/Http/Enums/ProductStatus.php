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
                return 'Hoạt động';
            case self::INACTIVE:
                return 'Không hoạt động';
        }
        return '';
    }
}
