<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Redirect; 
use App\menus; 
use App\restaurants; 
use App\menu_categories;
use Validator; 
use Session;
use\DB;
use Auth;
use App\User;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurant.addmenu');
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
           "servetype"=>"required|max:20",
           "price"=>"required",
           
        ],
        [   "name.required"=>"restaurant name is needed", 
            "servetype.required"=>"serve type is needed",
            "price.required"=>"Price is needed", 
             
             
        ])->Validate(); 
          
        $file = $request->file('image');
        $filename = 'image'.time().'.'.$request->image->extension();
        $destination = storage_path('../public/upload/menu');
        $file->move($destination,$filename); 
        $path = "http://agfoods.in/public/upload/menu/".$filename;
        
        $obj = new menus; 
        $obj->restaurant_id =$request->restaurant_id; 
        $obj->restaurant_name =$request->restaurant_name; 
        $obj->name=$request->name; 
        $obj->servetype= implode( ',', $request->servetype); 
        $obj->price=$request->price; 
        $obj->image=$path;//where image is a database name
        $obj->categories= menu_categories::where('id', $request->categories)->pluck('category_name')->first();  
        $obj->category_id=$request->categories;  
        $is_saved=$obj->save();  
        if ($is_saved) 
        {
          session()->flash("Message","Your Dishes is Added  successfully! ");
          return redirect("addcuisine"); 
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
        $forms=menus::where('restaurant_name', Auth::user()->name)->orderBy("id","desc")->get();
        return view('restaurant.viewallcuisine',compact("forms"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['profile']= menus::find($id);
        return view("restaurant.editcuisine",$data);
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
        $menu1 =menus::find($id);
        $is_deleted =$menu1->delete();
        if($is_deleted)
        { 
          return redirect("allmenu");
        }

    } 

    public function change_status($id,$status)
    {
        menus::Where('id',$id)->update([
          'status'=>$status
        ]);
        return back()->with('done','Status has been changed');
    }
    
    public function addcategoryform()
    {   
          
        return view('cuisine.addcuisinecategory');
    }

    public function addcuisinecategory(Request $request)
    {  
        $this->validate(request(), [
        'category_name' => 'required|unique:menu_category', 
        ]); 

        $file = $request->file('category_image');
        $filename = 'category_image'.time().'.'.$request->category_image->extension();
        $destination = storage_path('../public/upload/categoryimage');
        $file->move($destination,$filename); 
        $path = "http://agfoods.in/public/upload/categoryimage/".$filename;  
        
        $obj = new menu_categories;  
        $obj->category_name =$request->category_name;  
        $obj->category_image=$path;//where image is a database name
        $is_saved=$obj->save();  
        
        $data = restaurants::where('userid',Auth::User()->id)->first();
        $data1 = $data->categories;
       // dd($data1);
        restaurants::where('userid',Auth::User()->id)->update([  
          'categories' => $request->category_name.','. $data1
        ]); 

        if ($is_saved) 
        {
          session()->flash("Message","Your Categories is Added  successfully! ");
          return redirect('choose-category');
          
        }
    }
    
    public function categoryedit($id)
    {                      
        $category_edit = menu_category::select('category_name')->get();
        return view('cuisine.addcuisinecategory');  
    }

    public function showcategories()
    {   
       $data['category']= menu_categories::all();
       return view('restaurant.addmenu' ,$data);
    } 
 
    public function choosecategory()
    {   
        $data['category']= menu_categories::get();  
        $data['member']= restaurants::where('userid', Auth::user()->id)->where('categories','!=', null)->get(); 
        //dd($data);  
        return view('cuisine.choose_category' ,$data);
    }

    public function cuisinecategory(Request $request)  // this  store value in restaurant table category column
    {   
         $data=Validator::make($request->all(),
        [  
           "categories"=>"required" 
        ],
        [   "categories.required"=>"Categories is needed" 
        ])->Validate(); 
          
        restaurants::where('userid',Auth::User()->id)->update([
          'categories' => implode( ',',  $request->categories)
        ]);  
        session()->flash("Message","You choose your Categories is successfully! ");
        return redirect('choose-category');
         
    }
   

     

}
