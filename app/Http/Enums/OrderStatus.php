<?php


namespace App\Http\Enums;


class OrderStatus
{
    const CONFIRMED = 1;
    const SHIPPING = 2;
    const COMPLETED = 3;
    const CANCELED = 0;
}
