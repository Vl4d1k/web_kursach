<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Translatable;

class Category extends Model
{
    use Translatable;
    protected $fillable = ['code', 'name', 'description', 'image', 'name_en', 'description_en'];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
