<?php


namespace App\Http\Enums;


class OrderStatus
{
    const CONFIRMED = 1;
    const SHIPPING = 2;
    const COMPLETED = 3;
    const CANCELED = 4;

    public static function convert($status): string
    {
        switch ($status) {
            case self::CONFIRMED:
                return 'Đã xác nhận';
            case self::SHIPPING:
                return 'Đang giao hàng';
            case self::COMPLETED:
                return 'Hoàn tất';
            case self::CANCELED:
                return 'Đã hủy';
        }
        return '';
    }
}
