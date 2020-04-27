<?php

namespace App\Http\Controllers; 
use App\Http\Controllers\Controller;  
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;   
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
        if(Auth::user()->usertype == 4)        // it is a common form
        {  
             return redirect('selectform');
        }                                    

        elseif(Auth::user()->usertype == 1)   // it is an restaurant
        {  
            if(Auth::user()->is_active == 1)
            {
              return view('restaurant.index'); 
            }  
            elseif(Auth::user()->is_active == 3)
            {
              return view('restaurant.approval'); 
            } 
        }

        elseif(Auth::user()->usertype == 0) // it is an admin
        {  
            if(Auth::user()->is_active == 1)
            {
               return view('restaurant.index'); 
            } 
        }

        elseif(Auth::user()->usertype == 2) // it is an delivery boy
        {  
            if(Auth::user()->is_active == 1)
            {
              return view('deliveryboy.approval_page'); 
            } 
              

            elseif(Auth::user()->is_active == 3)
            {
              return view('deliveryboy.approval_page'); 
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

        if($req->type == 1) {

            return redirect('restaurant'); 
         
        }
        elseif($req->type == 2) {
            return redirect('deliveryboy'); 
         
        }
         
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
