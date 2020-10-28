<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Addfood;
use App\Category;
use App\OrderAddress;
use App\Addrestro;
use App\Cart;
use App\Payment;
use App\Orderdetails;

class LoginControlller extends Controller{
    
    public function about(){
        return view ('cravenation.about');
    }

    public function search(Request $request)
    {
        $searchData=$request->searchData;

        //start query for search

        $data=DB::table('Addfood')
        ->join('category','category.id','addfood.category_id')

        ->where('addfood.food_name','like','%'.$searchData.'%')
        ->get();
        return view('cravenation.restro',[
            'data' => $data, 'catByUser' => $searchData
        ]);
        
    }
    public function productsCat(Request $request){
         $cat_id=$request-> cat_id;
         $data = DB::table('Addfood')
         ->join('category','category.id','addfood.category_id')
         ->where('addfood.category_id',$cat_id)
         ->get();
         return view('cravenation.foodPage',[
             'data' => $data, 'catByUser' => 'All Products'
         ]);
    }

    public function restrodomino()
    {
        return view ('cravenation.restrodomino');
    }
    public function restromoti()
    {
        return view ('cravenation.restromoti');
    }
    

    public function cart2(){

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

    public function payment()
    {
        $loggedin_user_id = Cookie::get('userId');

        Cookie::queue('odder_gen_flag', NULL);

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
  
    public function placedOrders(Request $request)
    {
        $loggedin_user_id = Cookie::get('userId');

        $retuserObject=DB::table('signups')
        ->where('id',$loggedin_user_id)->get();

        $odder_gen_flag = Cookie::get('odder_gen_flag');

        $pay_ref_no = str_random(14);

        $delivaryCharge = Cookie::get('delivaryCharge');
        $sumOfCartItem=DB::table('crev_cart_details')
        ->whereNull('crev_cart_details.refNo')
        ->where('crev_cart_details.user_id',$loggedin_user_id) ->sum('crev_cart_details.item_amount');
        $totalAmount= $delivaryCharge+ $sumOfCartItem;

        $card_number = $request->input('card_number');
        $card_holder = $request->input('card_holder');
        $expiry = $request->input('expiry');
        $CVC = $request->input('CVC');
      
        if ($odder_gen_flag== NULL) {

            $paymentObject = new Payment();
            $paymentObject-> user_id = $loggedin_user_id;
            $paymentObject-> card_no = $card_number;
            $paymentObject-> name_on_card = $card_holder;
            $paymentObject-> card_exp_date= $expiry;
            $paymentObject-> card_cvv_no	= $CVC;
            $paymentObject-> pay_amount	= $totalAmount;
            $paymentObject-> payment_mode	= 'CDP';
            $paymentObject-> pay_ref_no	= $pay_ref_no;
            $paymentObject->save();
    
            $order_ref_no = str_random(6);
    
            $saved_address_rec_id = Cookie::get('addressRecordId');
    
            $saveAddressObject=DB::table('crev_user_address')
            ->where('crev_user_address.id',$saved_address_rec_id)->get();
    
            $fullAddress = $saveAddressObject[0]->address1 .' , '.$saveAddressObject[0]->city.' , '.$saveAddressObject[0]->state.' , '.$saveAddressObject[0]->country.' , '.$saveAddressObject[0]->zip_code.' , '.$saveAddressObject[0]->phone;
    
            $todays_date = date('Y-m-d');
    
            $orderObject = new Orderdetails();
            $orderObject-> user_id = $loggedin_user_id;
            $orderObject-> order_ref_no = $order_ref_no;
            $orderObject-> order_address = $fullAddress;
            $orderObject-> order_amount = $totalAmount;
            $orderObject-> order_date = $todays_date;
            $orderObject-> order_status = 'P';
            $orderObject->save();
    
            Cookie::queue('orderId', $order_ref_no);
    
            DB::table('crev_cart_details')
                ->where('user_id', $loggedin_user_id)
                ->update([
                    'refNo' => $order_ref_no
              ]);

              Cookie::queue('odder_gen_flag', 'Y');

        }

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

   
    
    public function thankyou()
    {
        return view ('cravenation.thankyou');
    }
    public function gormet()
    {
        return view ('cravenation.gormet');
    }
    public function addProduct()
    {
        return view ('cravenation.addProduct');
    }
   
   

    public function login(Request $request){

     $email = $request->input('email');
     $password = $request->input('password');

       $validation =$request -> validate([
        'email'=> 'required | email',
        'password'=>'required | min:4 |max:20'
        ]);

        if($validation){

            $checkLogin = DB::table('signups')->where(['email'=>$email,'password'=>$password])->get();

                if(count($checkLogin) >0){

                    $loggedinUserObject = $checkLogin[0];
                    
                    $loggedin_user_id = $loggedinUserObject->id;
                    $loggedin_user_email = $loggedinUserObject->email;
                    $loggedin_user_name = $loggedinUserObject->name;
                    $loggedin_user_role = $loggedinUserObject->user_role;


                    Cookie::queue('userId', $loggedin_user_id);
                    Cookie::queue('emailId', $loggedin_user_email);
                    Cookie::queue('userName', $loggedin_user_name);
                    Cookie::queue('userRole', $loggedin_user_role);

                    echo "Login successfull<br/>";

                    $categoryDropDownData=DB::table('category')->get();
                   $allRestaurentData=DB::table('restoname')->get();

                  $offerZoneRestaurentData= DB::table('restoname')
                 ->where('restoname.offer_zone_flag','Y')->get();

                 $cartItemCount= DB::table('crev_cart_details')
                 ->whereNull('crev_cart_details.refNo')
                 ->where('user_id', $loggedin_user_id)
                 ->count();

                 return view ('/cravenation.home',['categoryDropDownData'=>$categoryDropDownData, 'allRestaurentData'=>$allRestaurentData, 'offerZoneRestaurentData'=>$offerZoneRestaurentData, 'loggedin_user_email'=>$loggedin_user_email, 'loggedin_user_role'=>$loggedin_user_role, 'loggedin_user_name'=>$loggedin_user_name, 'cartItemCount'=>$cartItemCount]);
   
                }else{
                 echo "Login failed<br/>";
                 return view ('cravenation.loginsignup');
                }
        }
        else{
            echo "Email id and password are empty<br/>";
        }
      
    }
    
}
