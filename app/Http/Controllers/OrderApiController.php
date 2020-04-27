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

class OrderApiController extends Controller
{  
    
    
    public function myorderapi(Request $req) 
    {

        $order = order::where('user_id', $req->userid)->first();
        if($order) 
        {
            return response()->json($order = 
            [
                'status' => 200, 
                'user' => order_item::join('restaurant', 'order_item.restaurant_id', '=', 'restaurant.id')->join('order','order_item.order_id' , '=' , 'order.id')->select('order_id','name','item_name','item_quantity','order_status')->get()
                
            ]);
        } else 
        {
            return response()->json($order = 
            [
                'status' => 201,
                'msg' => 'Order Not found'
            ]);
        }
    }


    public function orderPlace(Request $req)
    {
    	


    }  
}