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
            case self::MOMO:
                $paymentMethod = 'MOMO';
            case self::CARD:
                $paymentMethod = 'CARD';
        }
        return $paymentMethod . ' method';
    }
}
