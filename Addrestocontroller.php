<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Addrestro;
use Illuminate\Support\Facades\Cookie;

class Addrestocontroller extends Controller{

    public function getRestaurentData(Request $request){
        $loggedin_user_id = Cookie::get('userId');
        $loggedin_user_email = Cookie::get('emailId');
        $loggedin_user_name = Cookie::get('userName');
        $loggedin_user_role = Cookie::get('userRole');
        $exsisting_token = Cookie::get('generatedToken');

        if ($loggedin_user_id== NULL && $exsisting_token==NULL) {

            $generated_token = str_random(10);

            Cookie::queue('generatedToken', $generated_token);
           
            $cartItemCount= DB::table('crev_cart_details')
            ->whereNull('crev_cart_details.refNo')
            ->where('session_id', $generated_token)
            ->count();
    
        } else if ($loggedin_user_id== NULL && $exsisting_token!==NULL) {

          
            $cartItemCount= DB::table('crev_cart_details')
            ->whereNull('crev_cart_details.refNo')
            ->where('session_id', $exsisting_token)
            ->count();
    
        }else {

            $cartItemCount= DB::table('crev_cart_details')
            ->whereNull('crev_cart_details.refNo')
            ->where('user_id', $loggedin_user_id)
            ->count();
        }

        $retoId = $request->category;

        Cookie::queue('item_add_flag', NULL);

        $categoryDropDownData=DB::table('category')->get();

        $restroDetails= DB::table('restoname')
        ->where('restoname.id',$retoId)->get();

        $foodItemListData=DB::table('addfood')
        ->join('category','category.id','addfood.category_id')
        ->join('restoname','restoname.id','addfood.resto_id')
        ->select('addfood.id', 'addfood.food_name', 'addfood.food_price', 'addfood.image')
        ->where('restoname.id',$retoId)->get();

        $foodItemCount = $foodItemListData->count();
       
        return view('cravenation.restro',['restroDetails' => $restroDetails, 'categoryDropDownData'=>$categoryDropDownData, 'foodItemListData'=>$foodItemListData, 'foodItemCount'=>$foodItemCount,'loggedin_user_email'=>$loggedin_user_email, 'loggedin_user_role'=>$loggedin_user_role, 'loggedin_user_name'=>$loggedin_user_name, 'cartItemCount'=>$cartItemCount, 'exsisting_token'=>$exsisting_token]);
    }


    public function address()
    {
        return view('postpage.addRestaurant');
    }

    public function store(Request $request )
    {
        $post = new AddRestro();

        $post->resto_name= $request->input('resto_name');
        $post->address= $request->input('address');
        $post->phone_number= $request->input('phone_number');
        
        if ($request-> hasfile('image')){
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time(). '.' . $extension;
            $file->move('uploads/restro', $filename);
            $post->image=$filename;
        }
        else{
            return $request;
            $post->image='';
        }
        $post->save();
        //return view('/postpage.addRestaurant')->with('addRestaurant',$post);
        return view('/cravenation.thankyou');

    }


}
