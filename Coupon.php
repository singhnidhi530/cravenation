<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table= 'crev_coupon_code';
    protected $fillable = ['id','user_id','coupon_code','disc_percent','start_date','end_date'];
}
