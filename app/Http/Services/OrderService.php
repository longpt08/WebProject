<?php

namespace App\Http\Services;

use App\Http\Enums\OrderStatus;
use App\Models\Order;

class OrderService
{
    public function cancelOrderById($id): bool
    {
        $order = Order::query()->find($id);
        $order->status = OrderStatus::CANCELED;
        return $order->save();
    }

    public function completeOrderById($id): bool
    {
        $order = Order::query()->find($id);
        $order->status = OrderStatus::COMPLETED;
        return $order->save();
    }
}
