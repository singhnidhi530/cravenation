<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table= 'crev_payment_details';
    protected $fillable = ['id','user_id','pay_ref_no','pay_amount','name_on_card','card_no','card_cvv_no','card_exp_date','payment_mode'];
}
