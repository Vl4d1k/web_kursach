<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Requests\OrderRequest;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class BasketController extends Controller
{

    public function basketPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);

        return view('order', compact('order'));
    }

    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        } else {
            session()->flash('warning', __('basket.cart_is_empty'));
            return redirect()->route('index');
        }
        return view('basket', compact('order'));
    }

    public function basketConfirm(OrderRequest $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $result = $order->saveOrder($request->name, $request->phone, $request->payment, $request->delivery);
        if ($result) {
            session()->flash('success', __('basket.you_order_confirmed'));
        } else  session()->flash('warning', __('basket.error'));
        return redirect()->route('index');
    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Product::find($productId);
        session()->flash('success', __('basket.added'). " " . $product->name);

        return redirect()->route('basket');
    }

    public function basketInput($productId)
    {
        $orderId = session('orderId');

        if (ctype_digit($_POST['kolvo'])) {
            $count = (int) $_POST['kolvo'];

            if (is_null($orderId)) {
                $order = Order::create();
                session(['orderId' => $order->id]);
            } else {
                $order = Order::find($orderId);
            }

            if ($order->products->contains($productId)) {
                $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
                $pivotRow->count = $count;
                $pivotRow->update();
            } else {
                $order->products()->attach($productId);
            }

            if (Auth::check()) {
                $order->user_id = Auth::id();
                $order->save();
            }

            $product = Product::find($productId);
            session()->flash('success', __('basket.added'). $product->name . __('basket.in_quantity') . $count);
        } else {
            session()->flash('warning', __('basket.digits'));
        }

        return redirect()->route('basket');
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;

                $pivotRow->update();
            }
        }
        $product = Product::find($productId);
        session()->flash('warning', __('basket.removed').$product->name);
        return redirect()->route('basket');
    }
}
