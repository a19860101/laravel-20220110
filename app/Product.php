<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['title','cover','description','price','sale','up_date','down_date'];

    public function carts(){
        return $this->belongsToMany('App\Cart');
    }
}
