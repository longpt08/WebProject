<?php

namespace App\Http\Controllers;

use App\Http\Enums\InvoiceStatus;
use App\Http\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function detail($id)
    {
        $order = Order::query()->where('id', $id)->first();
        return view('user.order-detail')->with(['order' => $order]);
    }

    public function getOrders()
    {
        $user = Auth::user();
        $orders = $user->orders;
        return view('user.order', ['orders' => $orders]);
    }

    public function cancel(int $id)
    {
        $order = Order::query()->find($id);
        if ($this->orderService->cancelOrder($order))
        {
            return redirect()->route('user-order-detail', ['id' => $id]);
        } else {
            return redirect()->route('user-order-detail', ['id' => $id])->with(['message' => 'Khong the huy don hang']);
        }
    }

    public function complete(int $id)
    {
        if ($this->orderService->completeOrderById($id))
        {
            return redirect()->route('user-order-detail', ['id' => $id]);
        } else {
            return redirect()->route('user-order-detail', ['id' => $id])->with(['message' => 'Khong the hoan tat don hang']);
        }
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
        if ($request->status == OrderStatus::CANCELED) {
            $this->orderService->cancelOrder($order);
        } else {
            $order->status = $request->status;
        }

        if ($order->save()) {
            $message = 'Cập nhật thành công!';
            $status = true;
        } else {
            $message = 'Cập nhật không thành công!';
            $status = false;
        }
        return redirect()->route('order-detail', ['id' => $id])
            ->with(['message' => $message, 'status' => $status]);
    }
}
