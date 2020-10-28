<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Addfood;
use App\Category;

class Addfoodcontroller extends Controller
{
    public function food(){

        $foodItemListData=DB::table('addfood')
        ->join('category','category.id','addfood.category_id')
        ->join('restoname','restoname.id','addfood.resto_id')
        ->select('addfood.id', 'addfood.food_name', 'addfood.food_price', 'addfood.image', 'restoname.resto_name', 'category.cat_name')
        ->get();

        $value = Cookie::get('emailId');

        return view ('postpage.addItem',['foodItemListData'=>$foodItemListData, 'value'=>$value]);
    }

    public function store(Request $request )
    {
        $post = new Addfood();

        $post-> food_name= $request->input('food_name');
        $post-> food_price= $request->input('food_price');
        $post-> category_id= $request->input('category_id');
        $post-> resto_id= $request->input('resto_id');
        
        if ($request-> hasfile('image')){
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time(). '.' . $extension;
            $file->move('uploads/food', $filename);
            $post->image=$filename;
        }
        else{
            return $request;
            $post->image='';
        }
        $post->save();

        $foodItemListData=DB::table('addfood')
        ->join('category','category.id','addfood.category_id')
        ->join('restoname','restoname.id','addfood.resto_id')
        ->select('addfood.id', 'addfood.food_name', 'addfood.food_price', 'addfood.image', 'restoname.resto_name', 'category.cat_name')
        ->get();
       
        return view ('postpage.addItem',['foodItemListData'=>$foodItemListData]);
    }
}
