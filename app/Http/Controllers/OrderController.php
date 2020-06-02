<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::active()->paginate(3);
        return view('auth.orders.index', compact('orders'));
    }

    public function show($orderId){
        $order = Order::where('id', $orderId)->first();
        return view('auth.orders.show', compact('order'));
    }
}
