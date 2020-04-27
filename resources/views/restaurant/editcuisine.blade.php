@extends('master') 
@section('main_body')
<br><br>
 <div class="container">
  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  @if(session()->has("Message"))
  <div class="alert alert-warning">
    <p>  {{session()->get("Message")}} </p>
  </div>
  @endif

<section class="content">
  <div class="row"> 
    <div class="col-md-"></div>
      <div class="col-md-7"> <br>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Update Cuisine/Dishes</h3>
          </div> 
          <form action="{{url('updatecuisine')}}"  method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$profile->id}}">  
            <div class="box-body"> 
              <input type="hidden" name="restaurant_id" value="{{ Auth::user()->id }}">

              <input type="hidden" name="restaurant_name" value="{{ Auth::user()->name }}">
              <div class="form-group">
                <label>Cuisine/Dishes Name</label>
                <input type="text" class="form-control"  placeholder="Enter dish name" name="name" value="{{ $profile->name}}">
              </div> 

              <div class="form-group">
                <label>Serve Type</label><br>
                <input type="checkbox" name="servetype[]" value="veg" @if($profile->servetype=='veg') checked  / @endif >Veg &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="servetype[]" value="nonveg" @if($profile->servetype=='nonveg') checked  / @endif>Non- Veg 
              </div>

              
              <div class="form-group">
                <label>Cuisine/Dish Price</label> 
                <input type="text" class="form-control"  placeholder="Enter Cuisine/Dish price" name="price" value="{{ $profile->price}}"> 
              </div>
 

              <div class="form-group">
                <label>Image</label><br>
                <img src="{{asset($profile ->image)}}" style="height: 70px; width: 100px;">
                <input type="file" name="image" class="form-control"  style="margin-top:10px;"> 
              </div>
               
<!-- 
              <div class="form-group">
                <label>Cuisine/Dish Category</label><br>
                <input type="checkbox" name="categories[]" value="chinese" @if($profile->categories=='chinese'){ selected='selected'} @endif >Chinese &nbsp;&nbsp;&nbsp;&nbsp; 
                <input type="checkbox" name="categories[]" value="continental" @if($profile->categories=='continental'){ selected='selected'} @endif>Continental &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="categories[]" value="fastfood" @if($profile->categories=='fastfood'){ selected='selected'} @endif>Fast-Food &nbsp;&nbsp;&nbsp;&nbsp; 
                <input type="checkbox" name="categories[]" value="mughlai" @if($profile->categories=='mughlai'){ selected='selected'} @endif>Mughlai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="categories[]" value="italian" @if($profile->categories=='italian'){ selected='selected'} @endif>Italian &nbsp;&nbsp;&nbsp;&nbsp; 
                <input type="checkbox" name="categories[]" value="punjabian" @if($profile->categories=='punjabian'){ selected='selected'} @endif>Punjabian&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="categories[]" value="southindian" @if($profile->categories=='southindian'){ selected='selected'} @endif>South-Indian &nbsp;&nbsp; 
                <input type="checkbox" name="categories[]" value="mexican" @if($profile->categories=='mexican'){ selected='selected'} @endif>Mexican &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="categories[]" value="american" @if($profile->categories=='american'){ selected='selected'} @endif>American &nbsp;&nbsp;&nbsp;&nbsp;  
              </div>  -->
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection