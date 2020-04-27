<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Redirect; 
use App\restaurants;
use App\titles; 
use App\Payouts; 
use App\Profiles; 
use Validator; 
use Session;
use\DB;
use Auth;
use App\User;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $forms=restaurants::select('id',$id)->first();
        return view('admin.outstandingpayout',compact("forms"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj=new Payouts; 
        $obj->restaurant_id=$request->restaurant_id;
        $obj->restaurant_name=$request->restaurant_name; 
        $obj->amount=$request->amount;
        $obj->method=$request->method;
        $obj->remark=$request->remark; 
        $is_saved=$obj->save();  
        restaurants::where('name', $request->restaurant_name)
        ->decrement('outstanding_balance', $request->amount);
        if($is_saved)
        {  
            session()->flash("Message","Fee Add successfully! "); 
            return redirect("outstandingpayout");
             
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forms=Payouts::where('restaurant_name', Auth::user()->name)->orderBy("id","desc")->paginate(5);
        return view('restaurant.previouspayment',compact("forms"));
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
        //

    } 


    public function hk($id)
    {    
        $forms =restaurants::where('id',$id)->first(); 
       
        return view('admin.releasepayment',compact("forms"));
    }
    
    public function profile( User $user)
    {    
        $data['profileUser'] = restaurants::where('email', Auth::user()->email)->first();
        //var_dump($data['profileUser']);
        return view('restaurant.outstandingpayoutrest', $data); 
        
    }
     
}
