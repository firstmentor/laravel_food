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
use App\banners;  

use Validator; 
use Session;
use\DB;
use Auth;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.addrestaurantprofile');
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

        //Commit data to user table
        $rest = new User;
        $rest->name = $request->name;
        $rest->email = $request->email;
        $rest->password = bcrypt($request->mobileno);
        $rest->is_active= 1;
        $rest->usertype= 1; 
        $rest->save(); 
        //Commit to restaurant table
        $obj = new restaurants; 
        $obj->userid = $rest->id;
        $obj->name=$request->name;
        $obj->address=$request->address;
        $obj->city=$request->city;

        $obj->email=$request->email;
        $obj->mobileno=$request->mobileno; 
        $obj->servetype= implode( ',', $request->servetype);  
        //
        $obj->image=$path;//where image is a database name
        //
        $obj->offer=$request->offer;  
        $obj->delivery_time=$request->delivery_time;  
        $obj->open_time=$request->open_hr.':'.$request->open_min.' :'.'00';/*':'.$request->open_min.' '.$request->open_meridian;*/  
        $obj->close_time=$request->close_hr.':'.$request->close_min.':'.'00';/*':'.$request->close_min.' '.$request->close_meridian;*/  
        $obj->working_days=implode( ',', $request->working_days);  
        $obj->cost_for_two=$request->cost_for_two;  
        $obj->bank_name=$request->bank_name;  
        $obj->bank_account_holder=$request->bank_account_holder;
        $obj->bank_account_no=$request->bank_account_no;  
        $obj->ifsc_code=$request->ifsc_code;  
        $is_saved=$obj->save(); 
        if ($is_saved) 
        {
          session()->flash("Message","Restaurant  is Added  successfully! ");
          return redirect("admin"); 
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
        $forms=restaurants::select('*')->get();
        return view('admin.allrestaurantlist',compact("forms"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
      
        $data['forms']= restaurants::find($id);
        return view('admin.editrestaurant'); 
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

    public function restaurantdelete($id)
    { 
       $delete = restaurants::where('id',$id)->delete();    
       return Redirect::to('/allrestaurant');    
    } 
   
    public function allrestaurant()              // This is a all restaurant show method
    {
        $forms=restaurants::select('*')->get();
        return view('admin.allrestaurantlist',compact("forms"));
    }                                          // This is a all restaurant show method end 

    // CK EDITOR  METHOD  STARTS//
    public function privacy()
    {
        $data = titles::where('id',1)->first();
        return view('admin.showdata',compact("data"));
    }

    public function term()
    {
        $data = titles::where('id',2)->first();
        return view('admin.showdata',compact("data"));
    }

    public function contact()
    {
        $data = titles::where('id',3)->first();
        return view('admin.showdata',compact("data"));
    }

    public function editor()
    {
        $data['result']=titles::Orderby('id','desc')->get();
        return view('admin.editor',$data);
    }

    public function details_update(Request $req)
    {
        titles::where('id',$req->id)->update([

         'content'=>$req->content 
        ]);

        return back()->with("Message","Data Updated successfully! ");
    } 
    // CK EDITOR  METHOD  end//

    
    public function outstandingpayout()                          //Outstanding Payment option start 
    {   
        $forms=restaurants::orderBy('id', 'desc')->get();

        return view('admin.outstandingpayout',compact('forms'));//Outstanding Payment option end 

    }                                   
    public function view($restaurant_id)                        // previous Payment option start 
    { 
        $forms= Payouts::select('*')->where('restaurant_id',$restaurant_id)->paginate(5);
        return view('admin.previouspayment',compact("forms"));  // previous Payment option end

    } 
    public function hk($id)
    {    
        $forms =restaurants::where('id',$id)->first(); 
        return view('admin.releasepayment',compact("forms"));
    }

    public function form(Request $request)                      // This is a payment add method start
    {
        $obj=new Payouts; 
        $obj->restaurant_id=$request->restaurant_id;
        $obj->amount=$request->amount;
        $obj->method=$request->method;
        $obj->remark=$request->remark; 
        $is_saved=$obj->save(); 
        restaurants::where('restaurant', $request->regno)
        ->increment('subfee', $request->fee);
        if($is_saved)
        {  
            session()->flash("Message","Fee Add successfully! "); 
            return redirect("outstandingpayout");
             
        }                                                     // This is a payment add method end
    } 

    public function alluser()                                 // This is a all user show method
    {
        $forms=profiles::select('*')->get();
        return view('admin.viewalluser',compact("forms"));  // This is a all user show method end
    }

     public function updateprofile(Request $request)
    {    
        /*$this->validate($request, [
            'image' => 'required|max:2048',
        ]);*/

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = 'image'.time().'.'.$request->image->extension();
            $destination = storage_path('../public/upload/restaurant');
            $file->move($destination,$filename); 
            $path = "http://agfoods.in/public/upload/restaurant/".$filename;

            restaurants::where('id', $request->id)->update([
             'name'=>$request->name,
             'address'=>$request->address,
             'image'=>$path,
               //where image is a database name

             'email' =>$request->email,
             'mobileno' => $request->mobileno, 
             'offer'=>$request->offer,  
             'delivery_time'=>$request->delivery_time,   
             'working_days'=>implode( ',', $request->working_days),  
             'cost_for_two'=> $request->cost_for_two,  
             'bank_name'=> $request->bank_name,  
             'bank_account_holder'=> $request->bank_account_holder,
             'bank_account_no'=> $request->bank_account_no,  
             'ifsc_code'=> $request->ifsc_code

            ]); 
        }

        else{

              restaurants::where('id', $request->id)->update([
             'name'=>$request->name,
             'address'=>$request->address, 
             'email' =>$request->email,
             'mobileno' => $request->mobileno, 
             'offer'=>$request->offer,  
             'delivery_time'=>$request->delivery_time,   
             'working_days'=>implode( ',', $request->working_days),  
             'cost_for_two'=> $request->cost_for_two,  
             'bank_name'=> $request->bank_name,  
             'bank_account_holder'=> $request->bank_account_holder,
             'bank_account_no'=> $request->bank_account_no,  
             'ifsc_code'=> $request->ifsc_code

           ]); 
        }
         return back()->with('success', 'Your Restaurant Data Updated successfully');
    } 
    
   

    public function editprofile($id)
    {    
        $data['profile'] = restaurants::where('id',$id)->first(); 
         
        return view('admin.editrestaurant', $data); 

    }

    public function approval()
    {   
        $forms = User::join('restaurant','users.id','=','restaurant.userid')->where('is_active',3)->select('restaurant.*')->get();
        /*$forms=User::where('is_active',3)->get();*/
        return view('admin.approval',compact("forms")); 
    }
    

    public function approvenow($id)
    {   
        User::where('id', $id)->update([
          'is_active' =>1
        ]);

        return back()->with('success', 'Account approved successfully');

    }

    public function deliveryboy()
    {
        return view('admin.add_delivery_boy');

    }

    public function adddeliveryform(Request $request)

    {    
        $file = $request->file('image');
        $filename = 'image'.time().'.'.$request->image->extension();
        $destination = storage_path('../public/upload/deliveryboy');
        $file->move($destination,$filename); 
        $path = "http://agfoods.in/public/upload/deliveryboy/".$filename;
        
        
        $rest = new User;
        $rest->name = $request->name;
        $rest->email = $request->email;
        $rest->password = bcrypt($request->mobileno);
        $rest->is_active= 2;
        $rest->usertype= 1; 
        $rest->save(); 

        $obj = new Delivery; 
        $obj->userid = $rest->id;

        $obj->name=$request->name;
        $obj->address=$request->address;
        $obj->image=$path;
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
        $is_saved=$obj->save(); 
 
         if ($is_saved) 
        {
          session()->flash("Message","Delivery Boy  is Added  successfully! ");
          return redirect("adddelivery"); 
        }
    }

    public function showdeliveryboy()
    {
        $forms=Delivery::select('*')->get();
        return view('admin.all_delivery_boy_list',compact("forms"));
    }

    public function approvaldeliveryboy()
    {   
        $forms = User::join('delivery_boy','users.id','=','delivery_boy.userid')->where('is_active',3)->select('delivery_boy.*')->get();
        /*$forms=User::where('is_active',3)->get();*/
        return view('admin.approval_delivery_boy',compact("forms")); 
    }
    

    public function approvedeliverydata($id)
    {   
        User::where('id', $id)->update([
          'is_active' =>1
        ]);

        return back()->with('success', 'Account approved successfully');

    }

    public function editdeliveryboy($id)
    {    
        $data['profile'] = Delivery::where('id',$id)->first(); 
         
        return view('admin.edit_delivery_boy', $data); 

    }


    public function updatedeliveryboy(Request $request)
    {   
        if($request->hasFile('image'))
        { 
            $file = $request->file('image');
            $filename = 'image'.time().'.'.$request->image->extension();
            $destination = storage_path('../public/upload/deliveryboy');
            $file->move($destination,$filename); 
            $path = "http://agfoods.in/public/upload/deliveryboy/".$filename; 
            Delivery::where('id', $request->id)->update([
             'name'=>$request->name,
             'address'=>$request->address,
             'image'=>$path, 
             'city' =>$request->city,
             'mobileno' => $request->mobileno, 
             'alternate_mobile'=>$request->alternate_mobile,  
             'addhar'=>$request->addhar,   
             'pancard'=>$request->pancard,  
             'email'=> $request->email,  
             'bank_name'=> $request->bank_name,  
             'bank_account_holder'=> $request->bank_account_holder,
             'bank_account_no'=> $request->bank_account_no,  
             'ifsc_code'=> $request->ifsc_code 
            ]); 
        } 
        else{
                Delivery::where('id', $request->id)->update
                ([
                 'name'=>$request->name,
                 'address'=>$request->address,
                  
                 'city' =>$request->city,
                 'mobileno' => $request->mobileno, 
                 'alternate_mobile'=>$request->alternate_mobile,  
                 'addhar'=>$request->addhar,   
                 'pancard'=>$request->pancard,  
                 'email'=> $request->email,  
                 'bank_name'=> $request->bank_name,  
                 'bank_account_holder'=> $request->bank_account_holder,
                 'bank_account_no'=> $request->bank_account_no,  
                 'ifsc_code'=> $request->ifsc_code 
                ]); 
            }
        return back()->with('success', 'Data Updated successfully');
    }  

    public function banner()
    {
        return view('admin.add_banner');
    }

    public function addbanner(Request $request)

    {    
        $file = $request->file('image');
        $filename = 'image'.time().'.'.$request->image->extension();
        $destination = storage_path('../public/upload/banner');
        $file->move($destination,$filename); 
        $path = "http://agfoods.in/public/upload/banner/".$filename;
        
        
        $obj = new banners;  
        $obj->title=$request->title; 
        $obj->image=$path; 
           
        $is_saved=$obj->save(); 
 
         if ($is_saved) 
        {
          session()->flash("Message","Delivery Boy  is Added  successfully! ");
          return redirect("banner
            "); 
        }
    }


}
