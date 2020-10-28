<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    protected $table= 'crev_order_details';
    protected $fillable = ['id','user_id','order_ref_no','order_address','order_amount','order_date','order_items','order_status'];
}
