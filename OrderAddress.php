<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $table= 'crev_user_address';
    protected $fillable = ['id','user_id','address1','address2','city','state','country','zip_code','phone'];
}
