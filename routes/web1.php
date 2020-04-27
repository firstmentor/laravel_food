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

Route::get('/', function () {
    return view('auth.login');
});                                                          // Login page 

Route::group(['middleware' => ['auth']], function()                 // It is a group middleware start
{             
	Route::get('dashboard','HomePageController@dashboard');    // it is a dashboard or card route    
	Route::get('selectform','HomePageController@selectform');    // it is a select form route
	Route::post('update','HomePageController@update');
	Route::resource('restaurant','RestaurantController');     // it is a restaurant profile form
	Route::resource('menu','MenuController');                  // it is a menu form route
	Route::resource('setting','RestaurantController1');       // it is a setting form 
	Route::get('profile','RestaurantController@profile');     // it is a restaurant profile form
    
	Route::get('addcategory','MenuController@addcategoryform');
	Route::post('addcategoryvalue','MenuController@addcuisinecategory');


	Route::get('allmenu','MenuController@show');             // it is a show/all menu view route
	Route::get('neworder','HomePageController@showneworder'); // it is a show neworder list  route
	Route::post('order1','HomePageController@buttonupdate');  // it is a menu form route
	Route::get('allorder','HomePageController@showallorder');        // it is a menu form route
	Route::get('changestatus/{id}/{status}','MenuController@change_status');// it is a menu form route
	Route::resource('admin','AdminController');     // it is a restaurant profile form
	Route::get('allrestaurant','AdminController@show');  // it is a show/all menu view route
	Route::get('alluser','AdminController@alluser');  // it is a show/all menu view route
	Route::get('editor','AdminController@editor');             // it is a show/all menu view route
	Route::post('details_update/{id}','AdminController@details_update'); // it is a show/all menu view route
	Route::get('/forms/{id}','AdminController@edit');
	Route::post('/update_restaurant/{id}','AdminController@update');
	Route::get('outstandingpayout','AdminController@outstandingpayout');
    Route::get('view/{id}','AdminController@view');
    Route::get('viewpay/{id}','RestaurantController@view');

    Route::get('/restaurant_delete/{id}','AdminController@restaurantdelete');
    

    Route::get('/profile','RestaurantController@profile');
    Route::get('/outprofile','PaymentController@profile');

    Route::get('/editprofile/{id}','RestaurantController@editprofile');
    Route::post('updateprofile','RestaurantController@updateprofile');

    Route::get('/editrestaurant/{id}','AdminController@editprofile');
    Route::post('updaterestaurant','AdminController@updateprofile');
    Route::get('approvenow','AdminController@approval');
    Route::get('approval/{id}','AdminController@approvenow'); 



    Route::get('editcuisine/{id}','RestaurantController@editcuisine');

    
    Route::post('updatecuisine','RestaurantController@updatecuisine');
    Route::post('updatesetting','RestaurantController1@updatesettingform'); 
    Route::get('addpay/{id}','PaymentController@hk'); // data view part//
    Route::post('form','AdminController@form'); // data view part//
    Route::resource('payment','PaymentController');


    //Delivery Boy
    Route::resource('deliveryboy','DeliveryController');     // it is a restaurant profile form
    Route::get('addcuisine','MenuController@showcategories'); 

    Route::get('approve_delivery_boy','AdminController@approvaldeliveryboy'); // data view part//

    Route::get('adddelivery','AdminController@deliveryboy'); // data view part//
    Route::post('adddeliverydata','AdminController@adddeliveryform'); // data view part//
    Route::get('showdeliveryboy','AdminController@showdeliveryboy'); // data view part//
    Route::get('/editdeliveryboy/{id}','AdminController@editdeliveryboy');
    Route::post('/update_delivery_boy','AdminController@updatedeliveryboy');

    Route::get('/banner','AdminController@banner');
    Route::post('/addbanner','AdminController@addbanner');
   

    
     
    
    
}); 

Auth::routes(); 
Route::get('/home', 'HomeController@index')->name('home');  // Auth route

route::get('privacy','AdminController@privacy');           //Privacy route
route::get('term','AdminController@term');                // Term route
route::get('contact','AdminController@contact');         // Contact route

Route::group(['middleware' => ['auth']], function()     // It is a group middleware start
{             
	 
    
});




