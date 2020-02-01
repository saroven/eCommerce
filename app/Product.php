<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['quantity'];

     public function category()
    {
    	return $this->belongsTo('App\Categories');
    }
}
