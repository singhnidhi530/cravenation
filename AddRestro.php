<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddRestro extends Model
{
    protected $table = 'restoname';
    protected $fillable =['id','resto_name','address','phone_number','image', 'offer_zone_flag', 'disc_percent', 'order_amount', 'offer_title'];
}
