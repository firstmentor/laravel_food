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
  <br>

<section class="content">
    <div class="row"> 
			<div class="col-md-offset-3 col-md-7">
			    <div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title"><b>Complete Your's Profile</b></h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<form action="{{url('/restaurant')}}"  method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
						 
					    <div class="box-body">
					    	<!-- <INPUT TYPE="hidden" NAME="longi" ID="longi" VALUE="">
                            <INPUT TYPE="hidden" NAME="lat" ID="lat" VALUE=""> -->
							<div class="form-group">
							  <label>Restaurant Name</label>
							  <input type="text" class="form-control"  placeholder="Enter name" name="name">
							</div>
							<div class="form-group">
							  <label>Restaurant Address</label>
							  <input type="text" class="form-control"  placeholder="Enter Address" name="address">
							</div>
							<div class="form-group">
							  <label>City</label>
							  <input type="text" class="form-control"  placeholder="Enter City" name="city">
							</div>
							<div class="form-group">
							  <label>Restaurant Email</label>
							  <input type="email" class="form-control"  placeholder="Enter Email" name="email">
							</div>
							<div class="form-group">
							  <label>Restaurant Contact no.</label>
							  <input type="number" class="form-control"  placeholder="Enter Contact number" name="mobileno">
							</div>
							<div class="form-group">
							  <label>What Do Your Serve ?</label><br>
							  <input type="checkbox" name="servetype[]" value="veg" 
							 >Veg &nbsp;&nbsp;&nbsp;&nbsp; 

							  <input type="checkbox" name="servetype[]" value="nonveg"
							    >Non- Veg 
							</div>
							
							<div class="form-group">
							  <label>Restaurant Image</label>
							  <input type="file" name="image" required>
							 <!--  <p class="help-block">Example block-level help text here.</p> -->
							</div> 
							<div class="form-group">
							  <label style="float:left;">Offer Discount</label>&nbsp; <p class="help-block"  style="float:right; color:red;"><b>*discount in percent</b>.</p>
							  <input type="text" class="form-control"  placeholder="Enter discount offer" name="offer">
							  <!-- <p class="help-block">*discount in percent.</p> -->
							</div>
							<div class="form-group">
							  <label style="float:left;">Delivery Time</label>&nbsp; <p class="help-block"  style="float:right; color:red;"><b>*delivery time in minutes</b>.</p>
						 
							  <input type="number" class="form-control"  placeholder="Enter delivery time" name="delivery_time">
							  <!-- <p class="help-block">*delvery time in minutes.</p> -->
							</div>
							<div class="row">
								<div class="col-md-6"> 
									<div class="form-group">
									    <label>Opening Time</label><br>
										<!-- <input type="time" class="form-control" name="open_time"> -->
										<select name="open_hr" onfocus='this.size=5;' onblur='this.size=1;' 
        									onchange='this.size=1; this.blur();'>
										  <option>hours</option>
										  <option value="01">01</option>
										  <option value="02">02</option>
										  <option value="03">03</option>
										  <option value="04">04</option>
										  <option value="05">05</option>
										  <option value="06">06</option>
										  <option value="07">07</option>
										  <option value="08">08</option>
										  <option value="09">09</option>
										  <option value="10">10</option>
										  <option value="11">11</option>
										  <option value="12">12</option>
										  <option value="13">13</option> 
										  <option value="14">14</option> 
										  <option value="15">15</option> 
										  <option value="16">16</option> 
										  <option value="17">17</option> 
										  <option value="18">18</option> 
										  <option value="19">19</option> 
										  <option value="20">20</option> 
										  <option value="21">21</option> 
										  <option value="22">22</option> 
										  <option value="23">23</option> 
										  <option value="24">24</option> 

										</select>&nbsp;&nbsp;&nbsp;
										<select name="open_min">
										  <option>Min</option>
										  <option value="00">00</option>
										  <option value="30">30</option> 
										</select>&nbsp;&nbsp;
										<!-- <select name="open_meridian">
											<option>Sec</option>
										  <option value="00">00</option>
										  <option value="30">30</option> 
										  <option value="am">AM</option>
										  <option value="pm" >PM</option> 
										</select> -->
										<!-- <p class="help-block">*delvery time in minutes.</p> -->
									</div>
								</div>
								<div class="col-md-6"> 
									<div class="form-group">
									    <label>Closing Time</label><br>
										<!-- <input type="time" class="form-control" name="close_time"> -->
										<select name="close_hr" onfocus='this.size=5;' onblur='this.size=1;' 
        								onchange='this.size=1; this.blur();' style="max-height:250px; overflow:auto;">
										  <option>hours</option>
										  <option value="01">01</option>
										  <option value="02">02</option>
										  <option value="03">03</option>
										  <option value="04">04</option>
										  <option value="05">05</option>
										  <option value="06">06</option>
										  <option value="07">07</option>
										  <option value="08">08</option>
										  <option value="09">09</option>
										  <option value="10">10</option>
										  <option value="11">11</option>
										  <option value="12">12</option>
										  <option value="13">13</option> 
										  <option value="14">14</option> 
										  <option value="15">15</option> 
										  <option value="16">16</option> 
										  <option value="17">17</option> 
										  <option value="18">18</option> 
										  <option value="19">19</option> 
										  <option value="20">20</option> 
										  <option value="21">21</option> 
										  <option value="22">22</option> 
										  <option value="23">23</option> 
										  <option value="24">24</option> 
										</select>&nbsp;&nbsp;&nbsp;
										<select name="close_min">
										  <option>Min</option>
										  <option value="00">00</option>
										  <option value="30">30</option> 
										</select>&nbsp;&nbsp;
										<!-- <select name="close_meridian">
											<option>Sec</option>
										  <option value="00">00</option>
										  <option value="30">30</option>
										   <option value="am">AM</option>
										  <option value="pm" >PM</option> 
										</select> -->
										<!-- <p class="help-block">*delvery time in minutes.</p> -->
									</div>
								</div> 
							</div>
							 <div class="form-group">
							  <label>Working Days</label><br>
							  <input type="checkbox" name="working_days[]" value="monday">Monday &nbsp;&nbsp;&nbsp;&nbsp; 
							  <input type="checkbox" name="working_days[]" value="tuesday">Tuesday &nbsp;&nbsp;&nbsp;&nbsp;
							  <input type="checkbox" name="working_days[]" value="wednesday">Wednesday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <input type="checkbox" name="working_days[]" value="thursday">Thursday &nbsp;&nbsp;&nbsp;&nbsp;
							  <input type="checkbox" name="working_days[]" value="friday">Friday&nbsp;&nbsp;&nbsp;&nbsp;
							  <input type="checkbox" name="working_days[]" value="saturday">Saturday &nbsp;&nbsp;
							  <input type="checkbox" name="working_days[]" value="sunday">Sunday &nbsp;&nbsp;&nbsp;&nbsp; 
						    </div> 
						    <div class="form-group">
							  <label>Cost Of Two</label>
							  <input type="number" class="form-control"  placeholder="Enter cost of two" name="cost_for_two">
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