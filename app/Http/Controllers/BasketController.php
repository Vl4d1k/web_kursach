<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Requests\OrderRequest;
use App\Product;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{

    public function basketPlace()
    {
        $orderId = session('orderId');
        if(is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);

        return view('order',compact('order'));
    }

    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        else {
            session()->flash('warning', 'Корзина пустая.');
            return redirect()->route('index');
        }
        return view('basket', compact('order'));
    }

    public function basketConfirm(OrderRequest $request)
    {
        $orderId = session('orderId');
        if(is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $result = $order->saveOrder($request->name,$request->phone,$request->payment, $request->delivery);
        if($result){
            session()->flash('success', 'Ваш заказ принят в обработку.');
        }
        else  session()->flash('warning', 'Произошла ошибка.');
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

        if(Auth::check()){
            $order->user_id = Auth::id();
            $order->save(); 
        }

        $product = Product::find($productId);
        session()->flash('success', 'Товар '.$product->name. ' был добавлен в корзину.');
        
        return redirect()->route('basket');
    }

    public function basketInput($productId, $count)
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
            $pivotRow->count = $count;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        if(Auth::check()){
            $order->user_id = Auth::id();
            $order->save(); 
        }

        $product = Product::find($productId);
        session()->flash('success', 'Товар '. $product->name. ' был добавлен в корзину в количестве ' .$count. ' штук.');
        
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
            if($pivotRow->count < 2){
                $order->products()->detach($productId);
            }
            else {
                $pivotRow->count--;
                
                $pivotRow->update();
            }
        } 
        $product = Product::find($productId);
        session()->flash('warning', 'Товар '.$product->name. ' был удален из корзины.');
        return redirect()->route('basket');
    }
}
