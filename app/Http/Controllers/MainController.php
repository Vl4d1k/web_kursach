<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Message;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index(Request $request){
        $productsQuery = Product::with('category');

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }
 
        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        $products = $productsQuery->paginate(6)->withPath("?" . $request->getQueryString());
        return view('index', compact('products'));
    }

    public function categories() {

        $categories = Category::get();
        return view('categories', compact('categories')); 
    }

    public function contactConfirm(Request $request)
    {
        $message = new Message;
        $result = $message->saveMessage($request->name, $request->message, $request->phone);
        if($result){
            session()->flash('success', 'Ваша заявка принята в обработку.');
        }
        else  session()->flash('warning', 'Произошла ошибка.');
        return redirect()->route('index'); 
    }

    public function contactPlace() {
        return view('contact'); 
    }

    public function map() {
        return view('map'); 
    }

    public function links() {
        return view('links'); 
    }

    public function history() {
        return view('history'); 
    }

    public function product($category, $productCode = null) {
        //images - массив фоток
        //render instead return
        $product = Product::where('code', $productCode)->first();
        return view('sliderproduct', compact('product'), ['product' => $productCode] );
    } 

    public function category($code) {
        $category = Category::where('code', $code)->first();
        $products = Product::get();
        return view('category', compact('category', 'products')); 
    }
}
