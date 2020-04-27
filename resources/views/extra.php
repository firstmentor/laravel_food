<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;  
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Redirect; 
use App\restaurant; 
use App\order; 
use App\order_item;
use Validator; 
use Session;
use\DB; 
use Auth;
use\App\User;

class HomePageController extends Controller
{   
    public function dashboard()
    {
        return view('restaurant.index');
    }

    public function index()
    {   
        if(Auth::user()->usertype == 0)  // it is an admin
        {  
             return redirect('dashboard');
        }

        elseif(Auth::user()->usertype == 1) // it is an restaurant
        {  
            if(Auth::user()->is_active == 1)
            {
               return redirect('dashboard');
            }

            elseif(Auth::user()->is_active == 2)
            {
               return redirect('restaurant');
            }
            
            else
            {
                return view('approval');
            } 
        }

        elseif(Auth::user()->usertype == 2) // it is an delivery boy
        {  
            if(Auth::user()->is_active == 2)
            {
               return redirect('restaurant');
            }
            
            else
            {
                return view('restaurant.index');
            } 
        }

        elseif(Auth::user()->usertype == 4) // it is default
        {
            if(Auth::user()->is_active == 2)
            {
              return redirect('selectform');
            } 
        } 
    } 
    
    public function selectform()
    {
        return view('restaurant.selectform');
    } 

    public function approvalpage()
    {
        return view('restaurant.approval');
    }

    public function update(Request $req)
    {
        User::where('id',Auth::User()->id)->update([
          'usertype' =>$req->type
        ]);
        return redirect('restaurant');
    }

    public function showneworder()
    { 
       $forms=order::where('restaurant_id', Auth::user()->id)->orderBy("id","desc")->get();
       return view('restaurant.neworder',compact("forms"));
    }

    public function showallorder()
    {
        $forms=order_item::where('restaurant_id', Auth::user()->id)->orderBy("id","desc")->get();
        return view('restaurant.allorder',compact("forms"));
    }

    public function buttonupdate(Request $req)
    {
        order::where('id',$req->id)->update
        ([
         'order_status'=>$req->order_status
        ]);
        return back()->with('success',"status Update successfully");
    }


   
}








========================================================================================================



======================================================
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Profiles; 
class CAuthController extends Controller
{
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
                    'user' => Profiles::where('email', $req->email )->orWhere('mobileno', $req->mobileno )->first();
                ]);

            } 
            else 
            { 
                return response()->json($data = 
                [
                    'status' => 201,
                    'msg' => 'User Not Found'
                ]);
            }
        }  
    }

    public function register(Request $req) 
    {
        $reg = new Profiles;
        $reg->name = $req->name;
        $reg->email = $req->email;
        $reg->mobileno = $req->mobileno;
        $reg->password = bcrypt($req->password);

        $reg->save();

        return response()->json($data = 
        [
            'status' => 200,
            'msg' => 'Success'
        ]);
    }

    public function userprofile(Request $req) 
    {

        $userprofile = profiles::where('id', $req->id)->select('name', 'email', 'mobileno')->first();
        if($userprofile) 
        {
            return response()->json($userprofile = 
            [
                'status' => 200,
                'userprofile' => $userprofile,
                 'msg' => "welcome"
            ]);
        } else 
        {
            return response()->json($userprofile = 
            [
                'status' => 201,
                'msg' => 'Not found'
            ]);
        }
    }
 

}
============================================================================================================
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Profiles; 
class CAuthController extends Controller
{

     public function login(Request $req) {
        $user = Profiles::where('email', $req->email)->orWhere('mobileno', $req->mobileno)->first();
        if($user != null) 
        {
            if(Hash::check($req->password, $user->password)) 
            {
                return response()->json($data = 
                [
                    'status' => 200,
                    'msg' => 'Success',
                    'user' => 
                    ['user_id' => Profiles::where('email', $req->email)->orWhere('mobileno', $req->mobileno)->first()
                    ]
                ]);
            } else 
            {
                return response()->json($data = 
                [
                    'status' => 201,
                    'msg' => 'Wrong Credentials'
                ]);
            }else 
            {
                return response()->json($data = 
                [
                    'status' => 400,
                    'msg' => 'Not Registered'
                ]);
            }
        }

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
                    'user' => Profiles::where('email', $req->email)->orWhere('mobileno', $req->mobileno)->first()
                ]);

            } 
            elseif 
            { 
                return response()->json($data = 
                [
                    'status' => 201,
                    'msg' => 'Email/password do not match'
                ]);
            }

            else 
            { 
                return response()->json($data = 
                [
                    'status' => 400,
                    'msg' => 'User not found'
                ]);
            }
        }  
    }

    public function register(Request $req) 
    {
        $reg = new Profiles;
        $reg->name = $req->name;
        $reg->email = $req->email;
        $reg->mobileno = $req->mobileno;
        $reg->password = bcrypt($req->password);
        $reg->refer_code = $req->refer_code;


        $reg->save();
        
        return response()->json($data = 
        [
            'status' => 200,
            'msg' => 'Success',
            'otp'=>
            'user'=>{
                $id:
                $name:
                $email:
                $$mobileno:
                $refer_code:
            }
        ]);
    }

    public function userprofile(Request $req) 
    {

        $userprofile = profiles::where('id', $req->id)->select('name', 'email', 'mobileno')->first();
        if($userprofile) 
        {
            return response()->json($userprofile = 
            [
                'status' => 200,
                'userprofile' => $userprofile,
                 'msg' => "welcome"
            ]);
        } else 
        {
            return response()->json($userprofile = 
            [
                'status' => 201,
                'msg' => 'Not found'
            ]);
        }
    }

     }