<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table= 'crev_cart_details';
    protected $fillable = ['id','retaurant_id','food_item_id','item_quantity','user_id','session_id','item_amount','refNo'];
}
