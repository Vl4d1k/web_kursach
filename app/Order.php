<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getFullPrice(){
        $sum = 0;
        foreach($this->products as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function saveOrder($name, $phone,$payment, $delivery){
        if($this->status == 0){
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->delivery = $delivery;
            $this->payment = $payment;
            $this->save();
            session()->forget('orderId'); 
            return true;
        }
        else {
            return false;
        }
    }
}