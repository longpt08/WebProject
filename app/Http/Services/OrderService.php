<?php

namespace App\Http\Services;

use App\Http\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;

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

    public function returnProductQuantity(int $orderId)
    {
        $order = Order::query()->find($orderId);
        $orderItems = $order->orderItems;
        foreach ($orderItems as $item) {
            $product = $item->product;
            $product->quantity += $item->amount;
            $product->save();
        }
    }
}
