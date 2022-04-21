<?php


namespace App\Http\Enums;


class InvoiceStatus
{
    const UNPAID = 0;
    const PAID = 1;
    const VOID = 2;

    public static function convert($status): string
    {
        switch ($status) {
            case self::UNPAID:
                return 'Unpaid';
            case self::PAID:
                return 'Paid';
            case self::VOID:
                return 'Void';
        }
        return '';
    }
}
