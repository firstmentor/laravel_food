<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 

//-------------CAuthController--------------------------------//
    Route::post('register', 'CAuthController@register');           // user register api 
    Route::post('login', 'CAuthController@login');                // user  login api
    Route::get('user-profile', 'CAuthController@userprofile');   //  user api to select Userprofile
    Route::post('verify-otp', 'CAuthController@otpVerify');            //  user otp  api      
    

    Route::post('restaurant-details', 'CAuthController@restaurantdetail');   // restaurant detail api 

                                                    

    Route::post('place-order', 'CAuthController@placeOrder'); 
    Route::get('my-orders', 'CAuthController@myorderapi');             // Myorder api 

//-------------  HomePageApiController --------------------------------//
   Route::get('home', 'HomePageApiController@homepage');                      
   Route::get('search', 'HomePageApiController@search');                      
    
   Route::post('add-address','HomePageApiController@addAddress');
   Route::post('edit-address','HomePageApiController@editAddress');
   Route::post('delete-address','HomePageApiController@deleteAddress');
   Route::get('get-address','HomePageApiController@getAddress');
   Route::get('get-all-address','HomePageApiController@getAllAddress');



//------------- DeliveryBoyApiController--------------------------------// 
   //Route::post('delivery-login','DeliveryBoyApiController@deliveryLogin'); //delivery login api                          
   //Route::post('delivery-homepage','DeliveryBoyApiController@deliveryHomepage');                            
//------------------------------------------------------------------------------


//------------- OrderApiController--------------------------------// 
   //Route::get('my_order','OrderApiController@myorderapi');                         




 