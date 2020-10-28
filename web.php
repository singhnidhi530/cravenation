<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 //Route::get('/', function () {
   //  return view('welcome');
 //});

Route::get('/cravenation.loginsignup','SignupControlller@create');
Route::resource('cravenation','SignupControlller');
Route::post('/cravenation.home', 'LoginControlller@login')->name('loginUser');

Route::get('/cravenation.home','Controller@index');
Route::get('/cravenation.about','LoginControlller@about');
Route::get('/cravenation.restro.{category}','Addrestocontroller@getRestaurentData');

Route::get('/cravenation.cart2.{foodItemId}','Controller@addItemToCart');
Route::get('/cravenation.cart2/del/{recId}', 'Controller@deleteCartItem');

Route::get('/cravenation.order_address','Controller@order_address');
Route::post('/goToPayments', 'Controller@saveAddress')->name('goToPayments');


Route::get('search','LoginControlller@search');
Route::get('/productsCat','LoginControlller@productsCat');

// Route::get('/cravenation.cart','LoginControlller@cart');
Route::get('/cravenation.cart2','LoginControlller@cart2');
Route::get('/cravenation.thankyou','LoginControlller@thankyou');

Route::get('/cravenation.payment','LoginControlller@payment');
Route::post('/placedOrder', 'LoginControlller@placedOrders')->name('placedOrder');
Route::get('/cravenation.placed_order_view','Controller@get_placed_order');

Route::get('/cravenation.order_tracking.{recId}','Controller@order_tracking');

Route::get('/cravenation.gormet','LoginControlller@gormet');

Route::get('/cravenation.addProduct','LoginControlller@addProduct');

Route::get('/postpage.addRestaurant', 'Addrestocontroller@address');
Route::post('/addimages', 'Addrestocontroller@store')->name('addimages');

Route::get('/postpage.addItem', 'Addfoodcontroller@food');
Route::post('/addimage', 'Addfoodcontroller@store')->name('addimage');

// Route::get('redirect', 'LoginControlller@redirect');


// Route::post('/cravenation.Store','SignupController@store');
Route::get ('test',function(){
  return App\Addfood::with('cats')->get();
});