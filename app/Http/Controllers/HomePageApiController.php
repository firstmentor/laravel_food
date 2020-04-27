<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;  
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Redirect; 
use\DB; 
use Auth;
use App\Address;
use Session; 
use\App\User; 
use App\order;  
use App\menus; 
use Validator;  
use App\banners; 
use App\order_item; 
use App\restaurants; 
use App\menu_categories; 
class HomePageApiController extends Controller
{    
    public function homepage(Request $req) 
    {    
        if ($req->latitude == null && $req->longitude == null) {
             return response()->json($data = [
                'status' => 201,
                'msg' => 'latitude and longitude is required',
                 
            ]); 
        }   
        else 
        {
            $googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$req->latitude.",".$req->longitude."&result_type=locality&key=AIzaSyCjf4v2Iaap5p7mNaROJ4RvU_knhiIG9do";
            $geocodeResponseData = file_get_contents($googleMapUrl);
            $responseData = json_decode($geocodeResponseData, true);
            if($responseData['status']=='OK') 
            {  
                foreach ($responseData['results'][0]['address_components'] as $r) { 
                    if ($r['types'][0]== 'locality') {
                        $city = $r['long_name'];
                        break;
                    }
                }   
            } else {
                echo "ERROR: {$responseData['status']}";
                return false;
            } 
            $banners = banners::select('image')->get();
            $categories = menu_categories::select('category_image', 'id','category_name')->get(); 
            $restaurant = null;
            $current=date("H:i:s");
            $current_time=date("H:i:s",strtotime('+5 hour +30 minutes'));
            if($req->categoryid == null)
            {
                if ($req->sort == 1) {
                    $restaurant = restaurants::select('id','image','name','categories','open_time','close_time','delivery_time','offer','cost_for_two')->where('city', $city)->orderby('cost_for_two','asc')->get();
                }
                elseif ($req->sort == 2) {
                     $restaurant = restaurants::select('id','image','name','categories','open_time','close_time','delivery_time','offer','cost_for_two')->where('city', $city)->orderby('cost_for_two','desc')->get();
                }
                elseif ($req->sort == 3) {
                    $restaurant = restaurants::select('id','image','name','categories','open_time','close_time','delivery_time','offer','cost_for_two')->where('city', $city)->orderby('delivery_time','asc')->get();
                }
            } else {
                if ($req->sort == 1) {
                    $restaurant = restaurants::select('id','image','name','categories','open_time','close_time','delivery_time','offer','cost_for_two')->where('city', $city)->where('categories', 'like', '%'.menu_categories::where('id', $req->categoryid)->pluck('category_name')->first().'%')->orderby('cost_for_two','asc')->get();
                }
                elseif ($req->sort == 2) {
                     $restaurant = restaurants::select('id','image','name','categories','open_time','close_time','delivery_time','offer','cost_for_two')->where('city', $city)->where('categories', 'like', '%'.menu_categories::where('id', $req->categoryid)->pluck('category_name')->first().'%')->orderby('cost_for_two','desc')->get();
                }
                elseif ($req->sort == 3) {
                    $restaurant = restaurants::select('id','image','name','categories','open_time','close_time','delivery_time','offer','cost_for_two')->where('city', $city)->where('categories', 'like', '%'.menu_categories::where('id', $req->categoryid)->pluck('category_name')->first().'%')->orderby('delivery_time','asc')->get();
                }
            } 
            if($restaurant != null) {
                return response()->json($data = [
                    'status' => 200,
                    'msg' => 'success',
                    'restaurant' => $restaurant,
                    'banners' => $banners,
                    'categories' => $categories, 
                    'current_time'=>$current_time
                ]); 
            }
            else 
            {
                return response()->json($data = [
                  'status' => 400,
                  'msg' =>'No restaurant found.',
                  // 'city' => $city

                ]);
            }
        }  

        // return response()->json($data = [
        //     'status' => 200
        // ]);
    }

    public function search(Request $req) {
        if ($req->latitude == null && $req->longitude == null) {
             return response()->json($data = [
                'status' => 201,
                'msg' => 'latitude and longitude is required',
                 
            ]); 
        }   
        else 
        {
            $googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$req->latitude.",".$req->longitude."&result_type=locality&key=AIzaSyCjf4v2Iaap5p7mNaROJ4RvU_knhiIG9do";
            $geocodeResponseData = file_get_contents($googleMapUrl);
            $responseData = json_decode($geocodeResponseData, true);
            if($responseData['status']=='OK') 
            {  
                foreach ($responseData['results'][0]['address_components'] as $r) { 
                    if ($r['types'][0]== 'locality') {
                        $city = $r['long_name'];
                        break;
                    }
                }   
            } else {
                echo "ERROR: {$responseData['status']}";
                return false;
            } 
            $restaurant = null;
            $current=date("H:i:s");
            $current_time=date("H:i:s",strtotime('+5 hour +30 minutes'));
            if(!$req->has('keyword')) {
                $restaurant = restaurants::select('id','image','name','categories','open_time','close_time','delivery_time','offer','cost_for_two')->where('city', $city)->get();
            } else {
                if($req->categoryid == null)
                {
                    $restaurant = restaurants::select('id','image','name','categories','open_time','close_time','delivery_time','offer','cost_for_two')->where('city', $city)->where('keywords', 'like', '%['.$req->keyword.']%')->get();
                } else {
                    $restaurant = restaurants::select('id','image','name','categories','open_time','close_time','delivery_time','offer','cost_for_two')->where('city', $city)->where('keywords', 'like', '%['.$req->keyword.']%')->where('categories', 'like', '%'.$req->categoryid.'%')->get();
                } 
            }
            if($restaurant != null) {
                return response()->json($data = [
                    'status' => 200,
                    'msg' => 'success',
                    'current_time'=>$current_time,
                    'restaurant' => $restaurant 
                ]); 
            }
            else 
            {
                return response()->json($data = [
                  'status' => 400,
                  'msg' =>'No restaurant found.',
                  // 'city' => $city

                ]);
            }

        }
    }
    public function addAddress(Request $req)
    {
      $user=order::where('user_id',$req->user_id)->first();
        $reg = new Address;
        $reg->user_id = $user->user_id;
        $reg->address_type = $req->address_type;
        $reg->flat_no = $req->flat_no;
        $reg->address = $req->address;
        $reg->landmark = $req->landmark;
        $reg->phone_no = $req->phone_no;
        $reg->save();
        if($reg){
            return response()->json($data = [
                    'status' => 200,
                    'msg' => 'Success'
                ]); 
        }
        else{
            return response()->json($data = [
                    'status' => 201,
                    'msg' => 'Failled'
                ]); 
        }

    }
     public function editAddress(Request $req)
    {
     // $user=Address::where('user_id',$req->user_id)->first();
      $users=Address::where('id',$req->address_id)->update([
        'address_type'=>$req->address_type,
        'flat_no'=>$req->flat_no,
        'address'=>$req->address,
        'landmark'=>$req->landmark,
        'phone_no'=>$req->phone_no
    ]);
        if($users){
            return response()->json($data = [
                    'status' => 200,
                    'msg' => 'Success',
                ]); 
        }
        else{
            return response()->json($data = [
                    'status' => 201,
                    'msg' => 'Failled'
                ]); 
        }
    }
    public function deleteAddress(Request $req)
    {
      $user=Address::where('id',$req->address_id)->delete();
        if($user){
            return response()->json($data = [
                    'status' => 200,
                    'msg' => 'Success',
                ]); 
        }
        else{
            return response()->json($data = [
                    'status' => 201,
                    'msg' => 'Failled'
                ]); 
        }

    }
    public function getAddress(Request $req)
    {
        $user=Address::where('id',$req->address_id)->first();
        if($user){
            return response()->json($data = [
                    'status' => 200,
                    'msg' => 'Success',
                    'user'=>Address::where('id',$req->address_id)->select('address_type','flat_no','address','landmark','phone_no')->first()
                ]); 
        }
        else{
            return response()->json($data = [
                    'status' => 201,
                    'msg' => 'Failled'
                ]); 
        }
    }
    public function getAllAddress(Request $req)
    {
        $user=Address::where('user_id',$req->user_id)->get();
        if($user){
            return response()->json($data = [
                    'status' => 200,
                    'msg' => 'Success',
                    'user'=>Address::where('user_id',$req->user_id)->select('address_type','flat_no','address','landmark','phone_no')->get()
                ]); 
        }
        else{
            return response()->json($data = [
                    'status' => 201,
                    'msg' => 'Failled'
                ]); 
        }
    }

   
}