<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Signup;
use App\Addrestro;

class SignupControlller extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(){

        Cookie::queue(Cookie::forget('userId'));
        Cookie::queue(Cookie::forget('emailId'));
        Cookie::queue(Cookie::forget('userName'));
        Cookie::queue(Cookie::forget('userRole'));

        $roleDropDownData= DB::table('role')
        ->where('role.user_role', '!=', 'Admin')->get();
        return view ('cravenation.loginsignup',['roleDropDownData'=>$roleDropDownData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');

        $signup = new Signup();

        $signup-> name= $request->input('name');
        $signup-> email= $request->input('email');
        $signup-> password= $request->input('password');
        $signup-> user_role= $request->input('user_role');

        $validation =$request -> validate([
            'name'=> 'required | max:20',
            'email'=> 'required | email',
            'password'=>'required | min:4 | max:20',
            'user_role' => 'required'
        ]);

        if($validation){

            $signup->save();

            $checkLogin = DB::table('signups')->where(['email'=>$email,'password'=>$password])->get();

            $loggedinUserObject = $checkLogin[0];
                    
                    $loggedin_user_id = $loggedinUserObject->id;
                    $loggedin_user_email = $loggedinUserObject->email;
                    $loggedin_user_name = $loggedinUserObject->name;
                    $loggedin_user_role = $loggedinUserObject->user_role;


                    Cookie::queue('userId', $loggedin_user_id);
                    Cookie::queue('emailId', $loggedin_user_email);
                    Cookie::queue('userName', $loggedin_user_name);
                    Cookie::queue('userRole', $loggedin_user_role);

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
            echo "Sign-up failed<br/>";
            return view ('cravenation.loginsignup');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
