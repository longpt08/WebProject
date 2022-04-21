<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function detail($id)
    {
        $order = Order::query()->where('id', $id)->first();
        return view('user.order-detail')->with(['order' => $order]);
    }

    public function getOrderDetail($id)
    {
        $order = Order::query()->find($id);
        $orderItems = $order->orderItems;
        return view('admin.order-detail', [
            'order' => $order,
            'orderItems' => $orderItems
        ]);
    }

    public function editOrder($id, Request $request)
    {
        $order = Order::query()->find($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->route('order-detail', ['id' => $id]);
    }
}
