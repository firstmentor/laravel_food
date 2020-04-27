@extends('master1') 
@section('title','Show Your Amount')
@section('main_body')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>Outstanding Payment</b></h3>
           <a href="{{url('payment/show')}}" class="btn btn-sm btn-success" style="float:right;">Previous Payment</a> 
        </div><!-- /.box-header --> 
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Sr.no</th>
            <th>Restaurant Name</th>
            <th>Restaurant Address</th>
            <th>Restaurant Email</th>
            <th>Restaurant Mobile number</th>
            <th>OutStanding Payment</th> 
          </tr>
        </thead>
        <tbody> 
          <td>{{ $profileUser->id}}</td>
          <td>{{ $profileUser->name}}</td>
          <td>{{ $profileUser->address}}</td>
          <td>{{ $profileUser->email}}</td>
          <td>{{ $profileUser->mobileno}}</td>
          <td>{{ $profileUser->outstanding_balance}}</td> 
        </tbody>
        <tfoot>
          <tr>
            <th>Sr.no</th>
            <th>Restaurant Name</th>
            <th>Restaurant Address</th>
            <th>Restaurant Email</th>
            <th>Restaurant Mobile number</th>
            <th>OutStanding Payment</th> 
          </tr>
        </tfoot><!-- 
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
        </tr>  -->
        <!-- <tr>  
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
        </tr>  --><!-- 
        <tr>  
          <th>OutStanding Payment</th>  
          <td>{{ $profileUser->outstanding_balance}}</td> 
        </tr>          -->                                        
      </table> 
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div>
  </div>
</section>
@endsection