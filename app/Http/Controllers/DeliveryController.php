<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Redirect; 
use App\restaurants;
use App\titles; 
use App\Payouts; 
use App\Profiles; 
use App\Delivery; 

use Validator; 
use Session;
use\DB;
use Auth;
use App\User;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('deliveryboy.addprofile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
          
        $file = $request->file('image');
        $filename = 'image'.time().'.'.$request->image->extension();
        $destination = storage_path('../public/upload/deliveryboy');
        $file->move($destination,$filename); 
        $path = "http://agfoods.in/public/upload/deliveryboy/".$filename;

        $obj = new Delivery; 
        $obj->name=$request->name;
        $obj->address=$request->address;
        $obj->image=$path;
        $obj->image=$filename;//where image is a database name
        $obj->city=$request->city;
        $obj->mobileno=$request->mobileno;
        $obj->alternate_mobile=$request->alternate_mobile; 
        $obj->addhar=$request->addhar;  
        $obj->pancard=$request->pancard;   
        $obj->email=$request->email;   
        $obj->password=bcrypt($request->password);  
        $obj->bank_name=$request->bank_name;  
        $obj->bank_account_holder=$request->bank_account_holder;
        $obj->bank_account_no=$request->bank_account_no;  
        $obj->ifsc_code=$request->ifsc_code; 
        $obj->userid = Auth::user()->id;
           
        $is_saved=$obj->save(); 

        User::where('id', Auth::id())->update([
                'is_active' => 3,
                'usertype' => 2
        ]);
        if ($is_saved) 
        {    
          session()->flash("Message","Your Profiles is Completed successfully! ");
          return redirect("dashboard"); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $menu1 =Delivery::find($id);
        $is_deleted =$menu1->delete();
        if($is_deleted)
        { 
          return redirect("showdeliveryboy");
        } 
    } 
}
