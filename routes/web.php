<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware(['set_locale'])->group(function () {

  Route::group([
    'prefix' => 'about'
  ], function () {
      Route::get('/map', 'MainController@map')->name('map');
      Route::get('/history', 'MainController@history')->name('history');
      Route::get('/links', 'MainController@links')->name('links');
  });
  
  Route::get('locale/{locale}', 'MainController@changeLocale')->name('locale');
  
  Route::post('/contact', 'MainController@contactConfirm')->name('contact-confirm');
  Route::get('/contact', 'MainController@contactPlace')->name('contact-place');
  
  Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
  ]);
  
  Route::get('/logout','Auth\LoginController@logout')->name('get-logout');  
  
  Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => 'person'
    ], function () {
        Route::get('/orders', 'PersonOrderController@index')->name('orders.index');
        Route::get('/orders/{order}', 'PersonOrderController@show')->name('person.orders.show');
    });
  });
  
    Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin'
  ], function(){
    Route::group(['middleware' => 'is_admin'], function(){
      Route::get('/messages','MessageController@index' )->name('messages');
      Route::get('/messages/{message}','MessageController@show' )->name('messages.show');
      Route::get('/orders','OrderController@index' )->name('home');
      Route::get('/orders/{order}','OrderController@show' )->name('orders.show');
    });
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
  });
  
  Route::get('/', 'MainController@index')->name('index');

  Route::get('/products', 'MainController@allProducts')->name('all-products');
  
  Route::get('/categories', 'MainController@categories')->name('categories');
  
  Route::post('basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');

  Route::post('wishlist/add/{id}', 'MainController@wishListAdd')->name('wishlist-add');
  Route::post('wishlist/remote/{id}', 'MainController@wishListRemove')->name('wishlist-remove');
  Route::group([
    'middleware' => 'basket_not_empty',
    'prefix' => 'basket',
  ], function(){
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
        Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
        Route::post('/input/{id}', 'BasketController@basketInput')->name('basket-input'); 
        Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm');
  });
  
  Route::get('/{category}', 'MainController@category')->name('category');
  Route::get('{category}/{product?}', 'MainController@product')->name('product');
});


