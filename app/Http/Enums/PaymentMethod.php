<?php


namespace App\Http\Enums;


class PaymentMethod
{
    const COD = 0;
    const MOMO = 1;
    const CARD = 2;

    public static function convert(int $method)
    {
        switch ($method) {
            case self::COD:
                $paymentMethod = 'COD';
                break;
            case self::MOMO:
                $paymentMethod = 'MOMO';
                break;
            case self::CARD:
                $paymentMethod = 'CARD';
                break;
        }
        return $paymentMethod . ' method';
    }
}
