@extends('master') 
@section('title','Add-DeliveryBoy')
@section('main_body')
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
			<div class="col-md-7">
			    <div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title"><b>Complete Delivery-Boy Profile</b></h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<form action="{{url('/adddeliverydata')}}"  method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
						 
					    <div class="box-body"> 
							<div class="form-group">
							  <label>Delivery Boy Name</label>
							  <input type="text" class="form-control"  placeholder="Enter name" name="name" required>
							</div>
							<div class="form-group">
							  <label>Address</label>
							  <input type="text" class="form-control"  placeholder="Enter Address" name="address" required>
							</div>
							<div class="form-group">
							  <label>Pic</label>
							  <input type="file" name="image" class="form-control" required> 
							</div> 
						    <div class="form-group">
							  <label>City</label>
							  <input type="text" class="form-control"  placeholder="Enter city" name="city" required>
							</div>
							<div class="form-group">
							  <label>Contact no.</label>
							  <input type="number" class="form-control"  placeholder="Enter Contact number" name="mobileno" required>
							</div> 
							<div class="form-group">
							  <label>Alternate Contact no.</label>
							  <input type="number" class="form-control"  placeholder="Enter alternate Contact number" name="alternate_mobile" required>
							</div> 
							<div class="form-group">
							  <label>Addhar Card Number</label>
							  <input type="text" class="form-control"  placeholder="Enter addhar card number" name="addhar" required>
							</div>
							<div class="form-group">
							  <label>Pan Card</label>
							  <input type="text" class="form-control"  placeholder="Enter Pancard" name="pancard" required>
							</div>  
							<div class="form-group">
							  <label>Email</label>
							  <input type="email" class="form-control"  placeholder="Enter Email" name="email" required> 
							</div> 
							<div class="form-group">
							  <label>Password</label>
							  <input type="password" class="form-control"  placeholder="Enter Password" name="password" required> 
							</div> 
							<div class="form-group">
							  <label>Bank Name</label>
							  <input type="text" class="form-control"  placeholder="Enter bank name" name="bank_name" required>
							</div>
							<div class="form-group">
							  <label>Bank Account Holder</label>
							  <input type="text" class="form-control"  placeholder="Enter bank account holder" name="bank_account_holder" required>
							</div> 
							<div class="form-group">
							  <label>Bank Account No.</label>
							  <input type="number" class="form-control"  placeholder="Enter account number" name="bank_account_no" required>
							</div> 
							<div class="form-group">
							  <label>Ifsc Code</label>
							  <input type="text" class="form-control"  placeholder="Enter ifsc code" name="ifsc_code" required>
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