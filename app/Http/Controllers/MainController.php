<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function index(Request $request){
        $productsQuery = Product::with('category');

        if ($request->filled('price_to') && $request->filled('price_from')){
            if($request->price_from > $request->price_to){
                session()->flash('warning', __('main.priceError'));
                $products = $productsQuery->paginate(6)->withPath("?" . $request->getQueryString());
                return view('index', compact('products'));
            }
        }

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
        return view('sliderproduct', compact('product'), ['product' => $productCode] );
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
}
