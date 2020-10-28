<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Addfood;
use App\Category;
use App\Addrestro;
use App\Cart;
use App\OrderAddress;


class Controller extends BaseController{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     public function index(){
        
        $loggedin_user_id = Cookie::get('userId');
        $loggedin_user_email = Cookie::get('emailId');
        $loggedin_user_name = Cookie::get('userName');
        $loggedin_user_role = Cookie::get('userRole');

        $exsisting_token = Cookie::get('generatedToken');

        Cookie::queue('item_add_flag', 'Y');

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

        $categoryDropDownData=DB::table('category')->get();
        $allRestaurentData=DB::table('restoname')->get();

        $offerZoneRestaurentData= DB::table('restoname')
        ->where('restoname.offer_zone_flag','Y')->get();

        return view ('cravenation.home',['categoryDropDownData'=>$categoryDropDownData, 'allRestaurentData'=>$allRestaurentData, 'offerZoneRestaurentData'=>$offerZoneRestaurentData, 'loggedin_user_email'=>$loggedin_user_email, 'loggedin_user_role'=>$loggedin_user_role, 'loggedin_user_name'=>$loggedin_user_name, 'cartItemCount'=>$cartItemCount, 'exsisting_token'=>$exsisting_token]);
   
    }

    public function filterCategoryDropDown(Request $request){

        $selCategory = $request->categoryId;

        $categoryDropDownData=DB::table('category')->get();

        $offerZoneRestaurentData= DB::table('restoname')
        ->where('restoname.offer_zone_flag','Y')->get();

        $allRestaurentData= DB::table('restoname')
        ->join('addfood','addfood.resto_id','restoname.id')
        ->join('category','category.id','addfood.category_id')
        ->select('restoname.id','restoname.resto_name','restoname.address','restoname.phone_number','restoname.image', 'restoname.offer_zone_flag', 'restoname.disc_percent', 'restoname.order_amount', 'restoname.offer_title')
        ->where('category.id', $selCategory)
        ->get();

        return view ('cravenation.home',['categoryDropDownData'=>$categoryDropDownData, 'allRestaurentData'=>$allRestaurentData, 'offerZoneRestaurentData'=>$offerZoneRestaurentData]);

    }
    public function addItemToCart(Request $request){

        $checkedOutItem = $request->foodItemId;

        $item_add_flag = Cookie::get('item_add_flag');

        $foodItemData=DB::table('addfood')
        ->join('restoname','restoname.id','addfood.resto_id')
        ->select('addfood.id AS itemId', 'restoname.id AS restroId' , 'addfood.food_price')
        ->where('addfood.id',$checkedOutItem)->get();

        $loggedin_user_id = Cookie::get('userId');

        if ($item_add_flag== NULL) {
           
            $cartItem = new Cart();

            $cartItem-> retaurant_id=  $foodItemData[0]->restroId;
            $cartItem-> food_item_id= $foodItemData[0]->itemId;
    
            if ($loggedin_user_id== NULL || $loggedin_user_id=='') {
    
                $generated_token = Cookie::get('generatedToken');
                $cartItem-> session_id= $generated_token;
    
            } else {
               $cartItem-> user_id= $loggedin_user_id;
            }
           
            $cartItem-> item_amount= $foodItemData[0]->food_price;
            $cartItem-> item_quantity= 1;
            $cartItem->save();
    
            Cookie::queue('item_add_flag', 'Y');
        }
       
        
        if ($loggedin_user_id== NULL) {
            $generated_token = Cookie::get('generatedToken');

            $cartData=DB::table('crev_cart_details')
            ->join('restoname','restoname.id','crev_cart_details.retaurant_id')
            ->join('addfood','addfood.id','crev_cart_details.food_item_id')
            ->select('crev_cart_details.id','crev_cart_details.item_quantity','crev_cart_details.item_amount','addfood.food_name', 'addfood.food_price' , 'restoname.resto_name', 'addfood.image')
            ->whereNull('crev_cart_details.refNo')
            ->where('crev_cart_details.session_id',$generated_token)->get();

            $sumOfCartItem=DB::table('crev_cart_details')
            ->whereNull('crev_cart_details.refNo')
            ->where('crev_cart_details.session_id',$generated_token) ->sum('crev_cart_details.item_amount');

        } else{

            $cartData=DB::table('crev_cart_details')
            ->join('restoname','restoname.id','crev_cart_details.retaurant_id')
            ->join('addfood','addfood.id','crev_cart_details.food_item_id')
            ->select('crev_cart_details.id','crev_cart_details.item_quantity','crev_cart_details.item_amount','addfood.food_name', 'addfood.food_price' , 'restoname.resto_name', 'addfood.image')
            ->whereNull('crev_cart_details.refNo')
            ->where('crev_cart_details.user_id',$loggedin_user_id)->get();

            $sumOfCartItem=DB::table('crev_cart_details')
            ->whereNull('crev_cart_details.refNo')
            ->where('crev_cart_details.user_id',$loggedin_user_id) ->sum('crev_cart_details.item_amount');
        }

        $delivaryCharge=100.00;
        Cookie::queue('delivaryCharge', $delivaryCharge);

        $totalAmount= $delivaryCharge+ $sumOfCartItem;

        return view ('cravenation.cart2',['cartData'=>$cartData,'sumOfCartItem'=>$sumOfCartItem,'delivaryCharge'=>$delivaryCharge,'totalAmount'=>$totalAmount]);

    }
  
    public function order_address(){
        
        $loggedin_user_id = Cookie::get('userId');

        $userData=DB::table('signups')
        ->where('id',$loggedin_user_id)->get();

        $delivaryCharge = Cookie::get('delivaryCharge');

        Cookie::queue('address_add_flag', NULL);
        Cookie::queue('odder_gen_flag', NULL);

        $cartData=DB::table('crev_cart_details')
        ->join('addfood','addfood.id','crev_cart_details.food_item_id')
        ->select('crev_cart_details.item_quantity','crev_cart_details.item_amount','addfood.food_name')
        ->whereNull('crev_cart_details.refNo')
        ->where('crev_cart_details.user_id',$loggedin_user_id)->get();



        $sumOfCartItem=DB::table('crev_cart_details')
        ->whereNull('crev_cart_details.refNo')
        ->where('crev_cart_details.user_id',$loggedin_user_id) ->sum('crev_cart_details.item_amount');

        $totalAmount= $delivaryCharge+ $sumOfCartItem;

        return view ('cravenation.order_address',['userData'=>$userData,'delivaryCharge'=>$delivaryCharge,'cartData'=>$cartData,'sumOfCartItem'=>$sumOfCartItem,'totalAmount'=>$totalAmount]);
    }

    public function  saveAddress(Request $request){
        
        $loggedin_user_id = Cookie::get('userId');

        Cookie::queue('odder_gen_flag', NULL);

        $address_add_flag = Cookie::get('address_add_flag');

        $houseadd = $request->input('houseadd');
        $town = $request->input('town');
        $country = $request->input('country');
        $state = $request->input('state');
        $zip = $request->input('zip');
        $phone = $request->input('phone');

        if ($address_add_flag== NULL) {
           
        $userObject = new OrderAddress();
        $userObject-> user_id = $loggedin_user_id;
        $userObject-> address1 = $houseadd;
        $userObject-> city = $town;
        $userObject-> state= $state;
        $userObject-> country=  $country;
        $userObject-> zip_code= $zip;
        $userObject-> phone= $phone;
        $userObject->save();

        Cookie::queue('addressRecordId', $userObject->id);
        Cookie::queue('address_add_flag', 'Y');

        }
        

        

        $Data=DB::table('crev_cart_details')
            ->join('restoname','restoname.id','crev_cart_details.retaurant_id')
            ->join('addfood','addfood.id','crev_cart_details.food_item_id')
            ->select('crev_cart_details.item_quantity','crev_cart_details.item_amount','addfood.food_name' , 'restoname.resto_name', 'addfood.image')
            ->whereNull('crev_cart_details.refNo')
            ->where('crev_cart_details.user_id',$loggedin_user_id)->get();

        $delivaryCharge = Cookie::get('delivaryCharge');

        $sumOfCartItem=DB::table('crev_cart_details')
        ->whereNull('crev_cart_details.refNo')
        ->where('crev_cart_details.user_id',$loggedin_user_id) ->sum('crev_cart_details.item_amount');
        $totalAmount= $delivaryCharge+ $sumOfCartItem;

        return view ('cravenation.payment',['totalAmount'=>$totalAmount,'sumOfCartItem'=>$sumOfCartItem,'delivaryCharge'=>$delivaryCharge,'Data'=>$Data]);
    }


    public function get_placed_order()
    {
        $loggedin_user_id = Cookie::get('userId');
        $retuserObject=DB::table('signups')
        ->where('id',$loggedin_user_id)->get();
 
            $ordRefNo = Cookie::get('orderId');
            
            $retorderObject=DB::table('crev_order_details')
        ->where('order_ref_no',$ordRefNo)->get();

        $retorderItems=DB::table('crev_cart_details')
        ->join('restoname','restoname.id','crev_cart_details.retaurant_id')
        ->join('addfood','addfood.id','crev_cart_details.food_item_id')
        ->select('crev_cart_details.item_quantity','crev_cart_details.item_amount','addfood.food_name' , 'restoname.resto_name', 'addfood.image')
        ->where('crev_cart_details.refNo',$ordRefNo)->get();

        $retdelivaryCharge = Cookie::get('delivaryCharge');

        $retsumOfCartItem=DB::table('crev_cart_details')
        ->where('crev_cart_details.refNo',$ordRefNo) ->sum('crev_cart_details.item_amount');
        $rettotalAmount= $retdelivaryCharge+ $retsumOfCartItem;
    
        return view ('cravenation.placed_order_view',['retuserObject'=>$retuserObject, 'retorderObject'=>$retorderObject, 'retorderItems'=>$retorderItems,'retdelivaryCharge'=>$retdelivaryCharge,'retsumOfCartItem'=>$retsumOfCartItem,'rettotalAmount'=>$rettotalAmount]);

    }

    
   
    public function order_tracking(Request $request)
    {
        $ordRefNo = $request->recId;

        $retorderObject=DB::table('crev_order_details')
        ->where('order_ref_no',$ordRefNo)->get();

        return view ('cravenation.order_tracking',['retorderObject'=>$retorderObject]);
    }
   
    public function deleteCartItem(Request $request){

        $delRecID = $request->recId;
        DB::table('crev_cart_details')->where('crev_cart_details.id', '=', 50)->delete();
  
        $loggedin_user_id = Cookie::get('userId');
  
        Cookie::queue('odder_gen_flag', NULL);
  
        if ($loggedin_user_id== NULL) {
            $generated_token = Cookie::get('generatedToken');
  
            $cartData=DB::table('crev_cart_details')
            ->join('restoname','restoname.id','crev_cart_details.retaurant_id')
            ->join('addfood','addfood.id','crev_cart_details.food_item_id')
            ->select('crev_cart_details.id','crev_cart_details.item_quantity','crev_cart_details.item_amount','addfood.food_name', 'addfood.food_price' , 'restoname.resto_name', 'addfood.image')
            ->whereNull('crev_cart_details.refNo')
            ->where('crev_cart_details.session_id',$generated_token)->get();
  
            $sumOfCartItem=DB::table('crev_cart_details')
            ->whereNull('crev_cart_details.refNo')
            ->where('crev_cart_details.session_id',$generated_token) ->sum('crev_cart_details.item_amount');
  
        } else{
  
            $cartData=DB::table('crev_cart_details')
            ->join('restoname','restoname.id','crev_cart_details.retaurant_id')
            ->join('addfood','addfood.id','crev_cart_details.food_item_id')
            ->select('crev_cart_details.id','crev_cart_details.item_quantity','crev_cart_details.item_amount','addfood.food_name', 'addfood.food_price' , 'restoname.resto_name', 'addfood.image')
            ->whereNull('crev_cart_details.refNo')
            ->where('crev_cart_details.user_id',$loggedin_user_id)->get();
  
            $sumOfCartItem=DB::table('crev_cart_details')
            ->whereNull('crev_cart_details.refNo')
            ->where('crev_cart_details.user_id',$loggedin_user_id) ->sum('crev_cart_details.item_amount');
        }
  
        $delivaryCharge=100.00;
        Cookie::queue('delivaryCharge', $delivaryCharge);
  
        $totalAmount= $delivaryCharge+ $sumOfCartItem;
  
        return view ('cravenation.cart2',['cartData'=>$cartData,'sumOfCartItem'=>$sumOfCartItem,'delivaryCharge'=>$delivaryCharge,'totalAmount'=>$totalAmount]);
        
      }
   
}
