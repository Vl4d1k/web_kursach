<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Message;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests\FeedbackRequest;
use App\Wishlist;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function index(Request $request){
        //get 6 products
        $productsQuery = Product::with('category');
        $products = $productsQuery->paginate(6)->withPath("?" . $request->getQueryString());
        
        //get curent order
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = null;
        }
        else $order = Order::find($orderId);

        //get wishlist
        $wishListId = session('wishListId');
        if (is_null($wishListId)) {
            $wishList = null;
        } else {
            $wishList = Wishlist::findOrFail($wishListId);
        }

        //return response()->json($products);

        return view('index', compact('products', 'order', 'wishList'));
    }

    public function allProducts(Request $request){

        //get all products
        $productsQuery = Product::with('category');

        if ($request->filled('price_max') && $request->filled('price_min')){
            if($request->price_min > $request->price_max){
                session()->flash('warning', __('main.priceError'));
                $products = $productsQuery->paginate(8)->withPath("?" . $request->getQueryString());
                return view('index', compact('products'));
            }
        }

        if ($request->filled('price_min')) {
            $productsQuery->where('price', '>=', $request->price_min);
        }
 
        if ($request->filled('price_max')) {
            $productsQuery->where('price', '<=', $request->price_max);
        }

        $products = $productsQuery->paginate(6)->withPath("?" . $request->getQueryString());
        
        //get curent order
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = null;
        }
        else 
            $order = Order::find($orderId);

        //get wishlist
        $wishListId = session('wishListId');
        if (is_null($wishListId)) {
            $wishList = null;
        } else
            $wishList = Wishlist::findOrFail($wishListId);
        
        $categories = Category::all();

        return view('all-products', compact('products', 'order', 'wishList', 'categories'));
    }




    public function categories() {
        $categories = Category::get();
        return view('categories', compact('categories')); 
    }

    public function contactConfirm(FeedbackRequest $request)
    {
        $message = new Message;
        $result = $message->saveMessage($request->name, $request->message, $request->phone);
        if($result){
            session()->flash('success', __('main.confirm'));
        }
        else  session()->flash('warning', __('main.error'));
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
        $product = Product::where('code', $productCode)->first();
        //get curent order
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = null;
        }
        else $order = Order::find($orderId);

        //get wishlist
        $wishListId = session('wishListId');
        if (is_null($wishListId)) {
            $wishList = null;
        } else {
            $wishList = Wishlist::findOrFail($wishListId);
        }
        return view('product', compact('product','wishList', 'order'), ['product' => $productCode] );
    } 

    public function category($code) {
        $category = Category::where('code', $code)->first();
        $products = Product::get();
        return view('category', compact('category', 'products')); 
    }

    public function changeLocale($locale)
    {
        $availableLocales = ['ru', 'en'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function wishListAdd($productId)
    {
        $wishListId = session('wishListId');

        if (is_null($wishListId)) {
            $wishList = Wishlist::create();
            session(['wishListId' => $wishList->id]);
        } else {
            $wishList = Wishlist::find($wishListId);
        }

        $product = Product::find($productId);

        //в смежную табличку добавляем в колонки id продукта и id списка желаний
        if(is_null($wishList->products()->where('wishlist_id', $wishList->id)->where('product_id', $productId)->first())) {
            $wishList->products()->attach($productId);
            session()->flash('success', "В избранное добавлен: " . $product->name);
        } 
        else {
            session()->flash('warning', "Товар : " . $product->name . " уже есть в списке желаний.");
        }
            
        return redirect()->route('index');
    }

    public function wishListRemove($productId)
    {
        $wishListId = session('wishListId');
        if (is_null($wishListId)) {
            $wishList = Wishlist::create();
            session(['wishListId' => $wishList->id]);
        } else {
            $wishList = Wishlist::find($wishListId);
        }

        if ($wishList->products->contains($productId)) {
            $wishList->products()->detach($productId);
        }
        $product = Product::find($productId);
        session()->flash('warning', "Из избранного удаоен товар: ".$product->name);
        return redirect()->route('index');
    }
}
