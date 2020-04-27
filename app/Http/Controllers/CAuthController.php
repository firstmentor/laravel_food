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
use App\Address;
use DB; 

class CAuthController extends Controller
{  

   
    //--------------------------------- LOGIN API START------------------------------------//
    public function login(Request $req) 
    {

        $user = Profiles::where('email', $req->email)->orWhere('mobileno', $req->mobileno)->first();
        if($user != null) 
        {
            if(Hash::check($req->password, $user->password)) 
            {
                return response()->json($data = 
                [
                    'status' => 200,
                    'msg' => 'Success',
                    'user' => Profiles::where('email', $req->email )->orWhere('mobileno', $req->mobileno)->select('id as userid','name','email','mobileno','applied_refer_code','refer_code')->first()
                ]);

            } 
            else 
            { 
                return response()->json($data = 
                [
                    'status' => 201,
                    'msg' => 'Credential Not Matched'
                ]);
            }
        }
        else
        { 
            return response()->json($data = 
            [
                'status' => 400,
               'msg' => 'Not Registered'
            ]);
        }
         
    }
   //--------------------------------- LOGIN API END------------------------------------//

  //--------------------------------- Registration  API start------------------------------//

    public function register(Request $req) 
    {
       if(Profiles::where('email', $req->email)->count() > 0) 
        {
            return response()->json($data = [
                'status' => 201,
                'msg' => 'Already Registered'
            ]);
        }
        else 
        {
            $otp = rand (100000, 999999);
           
            $reg = new Profiles;

            $reg->name = $req->name;
            $reg->email = $req->email;
            $reg->mobileno = $req->mobileno;
            $reg->password = bcrypt($req->password); 
            $reg->applied_refer_code = $req->refer_code; 
            $reg->otp = $otp;

            $is_saved=$reg->save();
             $rest = substr($req->name, 0,3);
            //dd($rest);
             $num = sprintf("%02s", $reg->id);
             $refer_code=$rest.$num;
             //dd($refer_code);
             if ($is_saved) {           
                DB::table('profiles')
                ->where('id', $reg->id)
                ->update(['refer_code' => $refer_code]);
            }

            //$user['userid'] = Profiles::where('email', $req->email)->pluck('id')->first();

            
            $msg = urlencode("Welcome to AGFOODS. Your OTP for registration is ".$otp);

            $curl = curl_init("http://roundsms.com/api/sendhttp.php?authkey=YTkxMjU0ODg1MmR&mobiles=".$req->mobileno."&message=".$msg."&sender=AGFSMS&type=1&route=2");

            curl_setopt ($curl,CURLOPT_RETURNTRANSFER,true);
            $response=curl_exec($curl);
            curl_close($curl);
            //echo $response;

            return response()->json($data = [
                'status' => 200,
                'msg' => 'Success',
                //'otp' => $otp,
                //'response'=>$response,
                'user' => Profiles::where('email', $req->email )->select('id as userid','name','email','mobileno','applied_refer_code','refer_code')->first()
            ]);
        }
    } 
  //--------------------------------- Registration  API End------------------------------//


 //--------------------------------- user profile start------------------------------------// 

    public function userprofile(Request $req) 
    {

        $userprofile = profiles::where('id', $req->userid)->select('name', 'email', 'mobileno')->first();
        if($userprofile) 
        {
            return response()->json($userprofile = 
            [
                'status' => 200,
                 'msg' => "Success",
                'userprofile' => Profiles::where('id', $req->userid )->select('id as userid','name','email','mobileno','applied_refer_code','refer_code')->first()
            ]);
        } else 
        {
            return response()->json($userprofile = 
            [
                'status' => 201,
                'msg' => 'Data Not found'
            ]);
        }
    }
 //--------------------------------- user profile end------------------------------------//
 
 //-----------------------------------------------------------------------------------//
    public function otpVerify(Request $req) 
    {
        if(Profiles::where('id', $req->userid)->pluck('otp')->first() == $req->otp) {
            return response()->json($data = [
                'status' => 200,
                'msg' => 'Success',
                'user' => Profiles::where('otp', $req->otp )->select('id','name','email','mobileno','refer_code')->first()
            ]);
            Profiles::where('id', $req->userid)->update([
                'otp'=>null
            ]);
        } else {
            return response()->json($data = [
                'status' => 201,
                'msg' => 'OTP did not match'
            ]);
        }
    }
 //---------------------------------------------------------------------------------------------//

 //--------------------------------------------------------------------------------------------//
    
    public function myorderapi(Request $req) 
    {

        $user = order::where('user_id', $req->userid)->first();
        if($user) 
        {
            return response()->json($user = 
            [
                'status' => 200, 
                'msg' => "Success",
                'orders' => order::where('user_id', $req->userid )->select('id as order_id','restaurant_id','ordered_products','order_amount as order_total','created_at as order_date_time', 'order_status')->get()
            ]);
        } else 
        {
            return response()->json($user = 
            [
                'status' => 201,
                'msg' => 'Not found'
            ]);
        }
    }

//---------------------------------------------------------------------------------------------//

 //--------------------------------------------------------------------------------------------//

    public function placeOrder(Request $req) 
    {
        $payment_url =  null;

        if($req->paymenttype != 'cod') {
            $payment_url = 'http://www.agfoods.in/';
        }

        $reg = new order;
        $reg->restaurant_id = $req->restaurantid;
        $reg->user_id = $req->userid;
        $reg->ordered_products = $req->orderedproducts;
        $reg->ordered_products_count = $req->orderedproductscount;
        $reg->order_amount = $req->ordertotalamount;
        $reg->delivery_charge = 0;
        $reg->restaurant_charge = 0;
        $reg->order_status = 'Pending';
        $reg->delivery_address = $req->deliveryaddress;
        $reg->payment_type = $req->paymenttype;
        $reg->payment_status = 'Pending';
        $reg->payment_request_id = null;
        $reg->payment_id = null;

        $reg->save();
        if($reg){
        return response()->json($data = 
        [
            'status' => 200,
            'msg' => 'Success',
           // 'user'=>Address::where('user_id',$req->userid)->select('id as address_id','address_type','flat_no','address','landmark','phone_no')->first(),
            'payment_url' => $payment_url

        ]);
        }
        else{
                return response()->json($data = [
                    'status' => 201,
                    'msg' => 'Failled'
                ]);
            }

    }
 //--------------------------------------------------------------------------------------------//
   /*public function myorderq(Request $req) 
    {
        $myorder = order_item::where('id', $req->id)->select('order_id','restaurant_id', 'item_quantity','order_id','item_price','total_item_price','item_name','created_at')->first();
        if($myorder) 
        {
            return response()->json($myorder = 
            [
                'status' => 200,
                'myorder' => $myorder,
                 'msg' => "welcome"
            ]);
        } else 
        {
            return response()->json($myorder = 
            [
                'status' => 201,
                'msg' => 'Not found'
            ]);
        }
    }*/
 //--------------------------------------------------------------------------------------------//
   

    public function restaurantdetail(Request $req) 
    {

        $restaurantdetail = restaurants::where('userid', $req->userid)->select('id','name','image','servetype','cost_for_two','categories')->first();
        if($restaurantdetail) 
        {
            return response()->json($restaurantdetail = 
            [
                'status' => 200,
                'restaurantdetail' => $restaurantdetail,
                 'msg' => "welcome"
            ]);
        } else 
        {
            return response()->json($restaurantdetail = 
            [
                'status' => 201,
                'msg' => 'Not found'
            ]);
        }
    }

 //--------------------------------------------------------------------------------------------//
 
 
     


}