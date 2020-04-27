<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Redirect; 
use App\restaurants;
use App\menus;  
use App\User;
use App\Payouts;

use Validator; 
use Session;
use\DB;
use Auth; 

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('restaurant.addrestaurantprofile');
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
                           "name"=>"required|max:255",
                           "address"=>"required|max:255",
                            "email"=>"required|max:255|email",
                            "mobileno"=>"required|max:25",
                           "servetype"=>"required|max:20",
                            
                           "offer"=>"required|max:255",
                           "delivery_time"=>"required|max:255",
                            
                           "working_days"=>"required|max:20",
                           "cost_for_two"=>"required|max:25",
                           "bank_name"=>"required|max:25",
                           "bank_account_holder"=>"required|max:25",
                           "bank_account_no"=>"required|max:25",
                           "ifsc_code"=>"required|max:25",

                        ],
                        [   "name.required"=>"restaurant name is needed",
                            "address.required"=>"restaurant address is needed",
                            "email.required"=>"Email is needed",
                            "email.email"=>"email should be valid email",
                            "mobileno.required"=>"contact no is needed",
                            "servetype.required"=>"serve type is needed",
                             
                            "offer.required"=>"Offer in percent is needed",
                            "delivery_time.required"=>" Delivery time is needed",
                            
                            "working_days.required"=>"Working Days is required",
                            "cost_for_two.required"=>"Cost for two person is needed",
                            "bank_name.required"=>"Bank Name is needed",
                            "bank_account_holder"=>"Bank Account Holder name is needed",
                            "bank_account_no"=>"Bank Account no. is needed", 
                            "ifsc_code.required"=>" ifsccode is needed", 
                        ])->Validate(); 
          
        $file = $request->file('image');
        $filename = 'image'.time().'.'.$request->image->extension();
        $destination = storage_path('../public/upload/restaurant');
        $file->move($destination,$filename); 
        $path = "http://agfoods.in/public/upload/restaurant/".$filename;


        $obj = new restaurants; 
        $obj->name=$request->name;
        $obj->address=$request->address;
        $obj->city=$request->city;
        
        $obj->email=$request->email;
        $obj->mobileno=$request->mobileno;

        $obj->servetype= implode( ',', $request->servetype);  
        $obj->image=$path; 
        $obj->offer=$request->offer;  
        $obj->delivery_time=$request->delivery_time;  
        $obj->open_time=$request->open_hr.':'.$request->open_min.' :'.'00';  
        $obj->close_time=$request->close_hr.':'.$request->close_min.':'.'00';  
        $obj->working_days=implode( ',', $request->working_days);  
        $obj->cost_for_two=$request->cost_for_two;   
        $obj->bank_name=$request->bank_name;  
        $obj->bank_account_holder=$request->bank_account_holder;
        $obj->bank_account_no=$request->bank_account_no;  
        $obj->ifsc_code=$request->ifsc_code;  
        $obj->userid = Auth::user()->id;


        $is_saved=$obj->save();

        User::where('id', Auth::id())->update([
                'is_active' => 3,
                'usertype' => 1
        ]);

        /*$rest = new User;
        $rest->name = $request->name;
        $rest->email = $request->email;
        $rest->password = bcrypt($request->mobileno);
        $rest->is_active= 3;
        $rest->usertype= 1; */
        
        if ($is_saved) 
        {

            
          session()->flash("Message","Your Profiles is Completed successfully! ");
          return redirect("dashboard"); 
        }
        /*var_dump($request->servetype);
        echo implode( ',', $request->servetype);*/

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
       $menu1 =restaurants::find($id);
        $is_deleted =$menu1->delete();
        if($is_deleted)
        { 
          return redirect("allrestaurant");
        }
    }
    
    public function profile( User $user)
    {    
        $data['profileUser'] = restaurants::where('email', Auth::user()->email)->first(); 
        return view('restaurant.profile', $data); 
    } 

    public function editprofile( User $user)
    {    
        $data['profile'] = restaurants::where('email', Auth::user()->email)->first();  
         
        return view('restaurant.editprofile', $data); 

    }

    public function editcuisine($id)
    { 
        $data['profile']= menus::find($id); 
        return view("restaurant.editcuisine",$data);
    }

    public function updatecuisine(Request $request)
    {  
         

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = 'image'.time().'.'.$request->image->extension();
            $destination = storage_path('../public/upload/menu');
            $file->move($destination,$filename); 
            $path = "http://agfoods.in/public/upload/menu/".$filename;

            menus::where('id', $request->id)->update([
            'name'=> $request->name, 
            'servetype'=>implode( ',', $request->servetype),  


            'price'=> $request->price,

            'image'=> $path
            ]);
        }

        else
        {
            menus::where('id', $request->id)->update([
            'name'=> $request->name, 
            'servetype'=>implode( ',', $request->servetype), 

            'price'=> $request->price 

            ]); 
        }
        
         return redirect('allmenu');
    }
     public function updateprofile(Request $request)
    {    
        $this->validate($request, [
            'image' => 'required|max:2048',
        ]);

        $file = $request->file('image');
        $filename = 'image'.time().'.'.$request->image->extension();
        $destination = storage_path('../public/upload/restaurant');
        $file->move($destination,$filename); 
        $path = "http://agfoods.in/public/upload/restaurant/".$filename;
         

        restaurants::where('id', $request->id)->update([
         'name'=>$request->name,
         'address'=>$request->address,
         'email' =>$request->email,
         'mobileno' => $request->mobileno,
          'image'=> $path, 
         'offer'=>$request->offer,  
         'delivery_time'=>$request->delivery_time,   
         'working_days'=>implode( ',', $request->working_days),  
         'cost_for_two'=> $request->cost_for_two,  
         'bank_name'=> $request->bank_name,  
         'bank_account_holder'=> $request->bank_account_holder,
         'bank_account_no'=> $request->bank_account_no,  
         'ifsc_code'=> $request->ifsc_code

        ]); 
         return back()->with('success', 'Your Restaurant Data Updated successfully');
    } 
   /* public function updateprofile(Request $request)
    {    
        $this->validate($request, [
            'image' => 'required|max:2048',
        ]);

        
        $file = $request->file('image');
        $filename = 'image'.time().'.'.$request->image->extension();
        $destination = storage_path('../public/upload');
        $file->move($destination,$filename);  

        restaurants::where('id', $request->id)->update([
         'name'=>$request->name,
         'address'=>$request->address,
         'email' =>$request->email,
         'mobileno' => $request->mobileno, 
         'image'=>$filename,//where image is a database name
         'offer'=>$request->offer,  
         'delivery_time'=>$request->delivery_time,   
         'working_days'=>$request->working_days,  
         'cost_for_two'=> $request->cost_for_two,  
         'bank_name'=> $request->bank_name,  
         'bank_account_holder'=> $request->bank_account_holder,
         'bank_account_no'=> $request->bank_account_no,  
         'ifsc_code'=> $request->ifsc_code

        ]); 
         return back()->with('success', 'Your Page Content Updated');
    } */

    public function view($id)                                     // previous Payment option start 
    { 
        $forms= Payouts::select('*')->where('restaurant_id',Auth::user()->id)->get();
        return view('restaurant.previouspayment',compact("forms"));  // previous Payment option end 
    } 
     
    public function outstandingpayoutrest()                          //Outstanding Payment option start 
    {   
        $forms=restaurants::orderBy('id', 'desc')->get();

        return view('admin.outstandingpayout',compact('forms'));//Outstanding Payment option end 

    } 
}
