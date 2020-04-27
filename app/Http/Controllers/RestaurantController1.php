<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Redirect; 
use App\settings; 
use Validator; 
use Session;
use\DB;
use Auth;
use App\User;
use App\restaurants;



class RestaurantController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurant.addsettingform');
        
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
        
        $data=Validator::make($request->all(),
                        [  
                           "offer"=>"required|max:255",
                           "delivery_time"=>"required|max:255", 
                           "working_days"=>"required|max:20",
                           "cost_for_two"=>"required|max:25", 
                        ],
                        [    
                            "offer.required"=>"Offer in percent is needed",
                            "delivery_time.required"=>" Delivery time is needed", 
                            "working_days.required"=>"Working Days is required",
                            "cost_for_two.required"=>"Cost for two person is needed",
                             
                        ])->Validate(); 

        $obj = new settings; 
        $obj->offer=$request->offer;  
        $obj->delivery_time=$request->delivery_time;  
        $obj->open_time=$request->open_hr.':'.$request->open_min.':'.'00';  
        $obj->close_time=$request->close_hr.':'.$request->close_min.':'.'00';  
        $obj->working_days=implode( ',', $request->working_days);  
        $obj->cost_for_two=$request->cost_for_two;  
        
         
        $is_saved=$obj->save(); 

        if ($is_saved) 
        {
          session()->flash("Message","Your setting form is Completed successfully! ");
          return redirect("setting"); 
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
        $setting=restaurant::find($id);
        return view('restaurant.addsettingform',compact("setting"));  
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
     

      
    public function updatesettingform(Request $request)
    {    
        restaurants::where('id', $request->id)->update([
        //'restaurantid'=> $request->restaurantid,  
        'offer'=> $request->offer, 
        'delivery_time'=> $request->delivery_time,
        'open_time' => $request->open_hr.':'.$request->open_min.' :'.'00',
        'close_time'=>$request->close_hr.':'.$request->close_min.':'.'00',
        'working_days' => implode( ',', $request->working_days),
        'cost_for_two'=> $request->cost_for_two 
        ]); 
         return back()->with('success', 'Your Page Content Updated');
    }
}
