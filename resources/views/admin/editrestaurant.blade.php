@extends('master') 
@section('title','edit restaurant profile')
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
  @if(session()->has("success"))
  <div class="alert alert-warning">
    <p>  {{session()->get("success")}} </p>
  </div>
  @endif

<section class="content">
  <div class="row">  
      <div class="col-md-7"> <br>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><b>Update Restaurant Profile</b></h3>
          </div> 
          <!-- form start -->
          <form action="{{url('updaterestaurant')}}"  method="post" enctype="multipart/form-data">
            {{csrf_field()}} 
            <input type="hidden" class="form-control"  name="id" value="{{ $profile->id}}">
            <div class="box-body"> 
              <div class="form-group">
                <label>Restaurant Name</label>
                
                <input type="text" class="form-control"  placeholder="Enter name" name="name" value="{{ $profile->name}}">
              </div>
              <div class="form-group">
                <label>Restaurant Address</label>
                <input type="text" class="form-control"  placeholder="Enter Address" name="address" value="{{ $profile->address}}">
              </div>
              <div class="form-group">
                <label>Restaurant Image</label><br>
                <img src="{{asset($profile ->image)}}" style="height: 70px; width: 100px;">
                <input type="file" name="image" class="form-control" style="margin-top:10px;"> 
              </div> 
              <div class="form-group">
                <label>Restaurant Email</label>
                <input type="email" class="form-control"  placeholder="Enter Email" name="email"  value="{{ $profile->email}}">
              </div>
              <div class="form-group">
                <label>Restaurant Contact no.</label>
                <input type="number" class="form-control"  placeholder="Enter Contact number" name="mobileno" value="{{ $profile->mobileno}}">
              </div> 
              <div class="form-group">
                <label style="float:left;">Offer Discount</label>&nbsp; <p class="help-block"  style="float:right; color:red;"><b>*discount in percent</b>.</p>
                <input type="text" class="form-control"  placeholder="Enter discount offer" name="offer" value="{{ $profile->offer}}"> 
              </div>
              <div class="form-group">
                <label style="float:left;">Delivery Time</label>&nbsp; <p class="help-block"  style="float:right; color:red;"><b>*delivery time in minutes</b>.</p> 
                <input type="number" class="form-control"  placeholder="Enter delivery time" name="delivery_time" value="{{ $profile->delivery_time}}"> 
              </div> 
              <div class="form-group">
                <label>Working Days</label><br>
                <input type="checkbox" name="working_days[]" value="monday"  @if($profile->working_days=='monday') checked  / @endif>Monday &nbsp;&nbsp;&nbsp;&nbsp; 
                <input type="checkbox" name="working_days[]" value="tuesday" @if($profile->working_days=='tuesday') checked  / @endif>Tuesday &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="working_days[]" value="wednesday" @if($profile->working_days=='wednesday') checked  / @endif>Wednesday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="working_days[]" value="thursday" @if($profile->working_days=='thursday') checked  / @endif>Thursday &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="working_days[]" value="friday" @if($profile->working_days=='friday') checked  / @endif>Friday&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="working_days[]" value="saturday" @if($profile->working_days=='saturday') checked  / @endif>Saturday &nbsp;&nbsp;
                <input type="checkbox" name="working_days[]" value="sunday" @if($profile->working_days=='sunday') checked  / @endif>Sunday &nbsp;&nbsp;&nbsp;&nbsp; 
              </div> 
              <div class="form-group">
                <label>Cost Of Two</label>
                <input type="number" class="form-control"  placeholder="Enter cost of two" name="cost_for_two" value="{{ $profile-> cost_for_two}}">
              </div>
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" class="form-control"  placeholder="Enter bank name" name="bank_name" value="{{ $profile->bank_name}}">
              </div>
              <div class="form-group">
                <label>Bank Account Holder</label>
                <input type="text" class="form-control"  placeholder="Enter bank account holder" name="bank_account_holder" value="{{ $profile->bank_account_holder}}">
              </div> 
              <div class="form-group">
                <label>Bank Account No.</label>
                <input type="number" class="form-control"  placeholder="Enter account number" name="bank_account_no" value="{{ $profile->bank_account_no}}">
              </div> 
              <div class="form-group">
                <label>Ifsc Code</label>
                <input type="text" class="form-control"  placeholder="Enter ifsc code" name="ifsc_code" value="{{ $profile->ifsc_code}}">
              </div>
              </div> 
              <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div> 
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection