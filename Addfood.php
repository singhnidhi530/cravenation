<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addfood extends Model
{
    protected $table= 'addfood';
    protected $fillable =['id','food_name','food_price','food_category','image','resto_id'];

    
    public function cats(){
        return $this->belongsTo('App\Category','category_id');
        //fatching category name using category_id that is foreign key
    }

}
