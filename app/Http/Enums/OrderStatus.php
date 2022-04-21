<?php


namespace App\Http\Enums;


class OrderStatus
{
    const CONFIRMED = 1;
    const SHIPPING = 2;
    const COMPLETED = 3;
    const CANCELED = 0;

    public static function convert($status): string
    {
        switch ($status) {
            case self::CONFIRMED:
                return 'Confirmed';
            case self::SHIPPING:
                return 'Shipping';
            case self::COMPLETED:
                return 'Completed';
            case self::CANCELED:
                return 'Canceled';
        }
        return '';
    }
}
