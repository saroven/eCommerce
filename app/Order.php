<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_city', 'billing_phone', 'shipping_name', 'shipping_address', 'shipping_city', 'shipping_message', 'subtotal', 'total'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
                // return $this->belongsToMany('App\Product')->withPivot('quantity');
    }

    // public function item()
    // {
    //     return $this->belongsTo('App\OrderProduct');
    //             // return $this->belongsToMany('App\Product')->withPivot('quantity');
    // }


}
