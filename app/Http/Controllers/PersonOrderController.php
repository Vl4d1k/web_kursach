<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Order;
use App\User;

class PersonOrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->active()->paginate(3);
        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if (!Auth::user()->orders->contains($order)) {
            return back();
        }

        return view('auth.orders.show', compact('order'));
    }
}
