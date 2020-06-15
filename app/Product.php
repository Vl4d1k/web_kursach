<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Translatable;


class Product extends Model
{ 
    use Translatable;
    
    protected $fillable = ['category_id', 'name', 'code', 'description', 'image','slide1','slide2', 'price', 'name_en', 'description_en'];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount(){
        if(!is_null($this->pivot)){
            return $this->price * $this->pivot->count;
        }
        return $this->price;
    }

    
}
