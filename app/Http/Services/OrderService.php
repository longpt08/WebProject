<?php

namespace App\Http\Services;

use App\Http\Enums\InvoiceStatus;
use App\Http\Enums\OrderStatus;
use App\Models\Order;

class OrderService
{
    public function cancelOrder($order): bool
    {
        $order->status = OrderStatus::CANCELED;
        $order->save();

        $orderItems = $order->orderItems;
        foreach ($orderItems as $item) {
            $product = $item->product;
            $product->quantity += $item->amount;
            $product->save();
        }

        $invoice = $order->invoice;
        $invoice->status = InvoiceStatus::VOID;
        return $invoice->save();
    }

    public function completeOrderById($id): bool
    {
        $order = Order::query()->find($id);
        $order->status = OrderStatus::COMPLETED;

        $invoice = $order->invoice;
        $invoice->status = InvoiceStatus::PAID;
        $invoice->save();
        
        return $order->save();
    }
}
