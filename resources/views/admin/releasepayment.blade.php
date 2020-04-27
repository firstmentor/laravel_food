@extends('master')
@section('title','Release Payment')
@section('main_body')
<div class="containe col-md-12">
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
  <div class="alert alert-success">
    <p>  {{session()->get("Message")}} </p>
  </div>
  @endif

  @section('body')
  @show
</div> 
  <div class="container">
    <div class="row">
      <div class="col-md-offset-1 col-md-10" style="margin: 20px;">
        <div class="heading bg-primary container" style="border-radius:20px; width:50%;">
          <h4 class="text-center"><b>Add Amount</b></h4>
        </div>
        <h3>Restaurant Detail's</h3>
        <dl class="dl-horizontal" style="margin: 25px;">
          <dt>Restaurant Name: </dt>
          <dd>{{ $forms->name }}</dd>
          <dt>Outstanding Balance: </dt>
          <dd>{{ $forms->outstanding_balance }}</dd> 
          <dt>Contact No.:</dt>
          <dd>{{ $forms->mobileno }}</dd>
          <dt>Address: </dt>
          <dd>{{ $forms->address }}</dd> 
        </dl>
         
        <form action="{{url('/payment')}}"  method="post" enctype="multipart/form-data">
          {{csrf_field()}} 
          <div class="card"> 
            <body> <br>
               <br> 
                <div class="card bg-light" style="background-color:#fff;"> 
                  <!-- <div class="container">
                    <div class="row"> -->
                      <input type="hidden" name="restaurant_id" value="{{ $forms->id }}">
                      <div class="col-md-8">
                        <div class="form-group">
                         <label for="company" class=" form-control-label">Add Payment </label>
                         <input type="text" id="fee" placeholder="Enter Payment" class="form-control" name="amount" value="{{old('amount')}}">
                        </div>
                      </div> 
                      <div class="col-md-8">
                      <div class="form-group">
                       <label for="company" class=" form-control-label">Remark</label>
                       <input type="text" id="remark" placeholder="Remark id" class="form-control" name="remark" value="{{old('remark')}}">
                      </div>
                    </div>  
                    
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="" style="color:#000;">Method</label>
                        <select data-placeholder="Types of payment"  name="method" class="form-control" style="background-color:#fff; color:#000;"   tabindex="1">
                          <option >Paytm</option>
                          <option >Cash</option>
                          <option >Net-Banking</option>
                          <option >UPI</option> 
                        </select>
                      </div> 
                    </div>  
                    <input type="hidden" name="restaurant_name" value="{{ $forms->name }}">
                    <div class="col-md-12"><button class="btn btn-primary" name="submit">Submit</button></div>
                    <!-- <div> 
                  </div> --> 
                </div>
              </div>
            </body>
          </div> 
        </form> 
      </div> 
    </div>
  </div>

@endsection
