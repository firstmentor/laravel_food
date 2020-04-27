<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\order_item; 
use App\Profiles; 
use App\order; 
use App\Payouts; 
use App\menus; 
use App\restaurants; 
use App\settings; 
use App\Delivery; 

class DeliveryBoyApiController extends Controller
{  
   // ----------------------------------------------- Delivery boy login api start--------------------------------// 
        public function deliveryLogin(Request $req) 
        { 
            $user = Delivery::where('email', $req->email)->first();
            if($user != null) 
            {
                if(Hash::check($req->password, $user->password)) 
                {
                    return response()->json($data = 
                    [
                        'status' => 200,
                        'msg' => 'Success',
                        'user' => Delivery::where('email', $req->email )->select('id','name','address','city','mobileno','alternate_mobile','addhar','pancard','email')->first()
                    ]); 
                }else {
                    return response()->json($data = [
                        'status' => 201,
                        'msg' => 'Wrong Credentials'
                    ]);
                }
            }else {
                return response()->json($data = [
                    'status' => 400,
                    'msg' => 'Not Registered'
                ]);
            }
             
        }
   // ----------------------------------------------- Delivery boy login api End ---------------------------------//

   // ----------------------------------------------- Delivery boy homepage api start----------------------------// 
        public function deliveryHomepage(Request $req) 
        {              
            $order = order::where('delivery_boy_id', $req->user_id)->where('order_status', '=','1')->orWhere('order_status', '<','4')->orderby('id','desc')->select('restaurant_id','user_id','order_amount','delivery_charge','restaurant_charge')->get();
            if($order != null) 
            {   
                 
                if($order) { 
                    return response()->json($data = 
                    [
                        'status' => 200, 
                        'order' => $order
                    ]); 
                }
            }  
            else 
            {
                return response()->json($data = [
                    'status' => 201,
                    'msg' => 'No New Order'
                ]);
            }
             
        } 
   // ----------------------------------------------- Delivery boy homepage api End ----------------------------//



}