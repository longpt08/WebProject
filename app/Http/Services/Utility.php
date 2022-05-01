<?php


namespace App\Http\Services;

use App\Models\Product;

class Utility
{
    public static function convertPrice(int $price): string
    {
        return number_format($price, 0, '', ',').' VND';
    }
}
