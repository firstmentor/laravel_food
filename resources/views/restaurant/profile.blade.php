@extends('master1')
@section('title','Show Our Profile')
@section('main_body')
<div class="col-lg-12 col-md-12" style="background-color:#ecf0f5;"> 
  <div class="">
    <h3 class="box-title text-center">Restaurant Profile</h3><hr>
    <div class="">
      <a href="{{url('editprofile/{id}')}}"><button class="btn btn-sm" style="background-color:white;">Update Your Profile</button></a>  
      <img src="{{ asset('upload/'.$profileUser->image) }}" height="150" width="180" style="border-radius: 30%; margin-left:391px;"><hr>
      <table width="120%">  
        <tr>  
          <th>Restaurant Name</th>  
          <td>{{ $profileUser->name}}</td> 
        </tr>
        <tr>  
          <th>Restaurant Address</th>  
          <td>{{ $profileUser->address}}</td> 
        </tr>  
        <tr>  
          <th>Restaurant Email</th>  
          <td>{{ $profileUser->email}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Mobile number</th>  
          <td>{{ $profileUser->mobileno}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Service Type</th>  
          <td>{{ $profileUser->servetype}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Menu Type</th>  
          <td>{{ $profileUser->menutype}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Offer</th>  
          <td>{{ $profileUser->offer}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Delivery Time</th>  
          <td>{{ $profileUser->delivery_time}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Open Time</th>  
          <td>{{ $profileUser->open_time}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Close Time</th>  
          <td>{{ $profileUser->close_time}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Working days</th>  
          <td>{{ $profileUser->working_days}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Cost_For_Two</th>  
          <td>{{ $profileUser->cost_for_two}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Bank name</th>  
          <td>{{ $profileUser-> bank_name}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Bank Account holder</th>  
          <td>{{ $profileUser->bank_account_holder}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Bank Account no.</th>  
          <td>{{ $profileUser->bank_account_no}}</td> 
        </tr> 
        <tr>  
          <th>Restaurant Ifsc Code</th>  
          <td>{{ $profileUser->ifsc_code}}</td> 
        </tr>                                                 
      </table> 
    </div>
  </div>
</div>
@endsection
