@extends('commonmaster') 
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
			<div class="col-md-offset-3 col-md-7">
			    <div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title"><b>Complete Your's Profile</b></h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<form action="{{url('/deliveryboy')}}"  method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
						 
					    <div class="box-body"> 
							<div class="form-group">
							  <label>Delivery Boy Name</label>
							  <input type="text" class="form-control"  placeholder="Enter name" name="name">
							</div>
							<div class="form-group">
							  <label>Address</label>
							  <input type="text" class="form-control"  placeholder="Enter Address" name="address">
							</div>
							<div class="form-group">
							  <label>Pic</label>
							  <input type="file" name="image" class="form-control" required> 
							</div> 
						    <div class="form-group">
							  <label>City</label>
							  <input type="text" class="form-control"  placeholder="Enter city" name="city">
							</div>
							<div class="form-group">
							  <label>Contact no.</label>
							  <input type="number" class="form-control"  placeholder="Enter Contact number" name="mobileno">
							</div> 
							<div class="form-group">
							  <label>Alternate Contact no.</label>
							  <input type="number" class="form-control"  placeholder="Enter alternate Contact number" name="alternate_mobile">
							</div> 
							<div class="form-group">
							  <label>Addhar Card Number</label>
							  <input type="text" class="form-control"  placeholder="Enter addhar card number" name="addhar">
							</div>
							<div class="form-group">
							  <label>Pan Card</label>
							  <input type="text" class="form-control"  placeholder="Enter Pancard" name="pancard">
							</div>  
							<div class="form-group">
							  <label>Email</label>
							  <input type="email" class="form-control"  placeholder="Enter Email" name="email">
							</div> 
							<div class="form-group">
							  <label>Password</label>
							  <input type="password" class="form-control"  placeholder="Enter Password" name="password" required> 
							</div> 
							<div class="form-group">
							  <label>Bank Name</label>
							  <input type="text" class="form-control"  placeholder="Enter bank name" name="bank_name">
							</div>
							<div class="form-group">
							  <label>Bank Account Holder</label>
							  <input type="text" class="form-control"  placeholder="Enter bank account holder" name="bank_account_holder">
							</div> 
							<div class="form-group">
							  <label>Bank Account No.</label>
							  <input type="number" class="form-control"  placeholder="Enter account number" name="bank_account_no">
							</div> 
							<div class="form-group">
							  <label>Ifsc Code</label>
							  <input type="text" class="form-control"  placeholder="Enter ifsc code" name="ifsc_code">
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