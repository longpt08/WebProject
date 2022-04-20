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
}
