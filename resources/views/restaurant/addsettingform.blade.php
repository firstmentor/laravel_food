@extends('master') 
@section('title','Update Setting')
@section('main_body')
<br><br><div class="container">
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
		<div class="col-md-7"> 
		    <div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title"><b>Update Setting Form</b></h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				    @php
					$setting = DB::table('restaurant')->where('userid', Auth::user()->id)->first(); 
					@endphp
				   <form action="{{url('updatesetting')}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
					
				    <div class="box-body">  
				    	<input type="hidden" class="form-control"  name="id" value="{{ $setting->id}}">
                        <input type="hidden" name="restaurantid" value="{{ Auth::user()->id }}">

						<div class="form-group">
						  <label style="float:left;">Offer Discount</label>&nbsp; <p class="help-block"  style="float:right; color:red;"><b>*discount in percent</b>.</p>
						  <input type="text" class="form-control"  placeholder="Enter discount offer" name="offer" value="{{ $setting->offer }}">
						  <!-- <p class="help-block">*discount in percent.</p> -->
						</div>
						<div class="form-group">
						  <label style="float:left;">Delivery Time</label>&nbsp; <p class="help-block"  style="float:right; color:red;"><b>*delivery time in minutes</b>.</p>
						   
						  <input type="number" class="form-control"  placeholder="Enter delivery time" name="delivery_time" value="{{ $setting->delivery_time }}">
						  <!-- <p class="help-block">*delvery time in minutes.</p> -->
						</div>
						<div class="row">
							<div class="col-md-6"> 
								<div class="form-group">
								    <label>Opening Time</label><br>
									<!-- <input type="time" class="form-control" name="open_time"> -->
									<select name="open_hr"onfocus='this.size=5;' onblur='this.size=1;' 				onchange='this.size=1; this.blur();'>
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
									<select name="close_hr">
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
									  <option value="am">AM</option>
									  <option value="pm" >PM</option> 
									</select> -->
									<!-- <p class="help-block">*delvery time in minutes.</p> -->
								</div>
							</div> 
						</div>
						<div class="form-group">
			                <label>Working Days</label><br>
			                <input type="checkbox" name="working_days[]" value="monday"  @if($setting->working_days=='monday') checked  / @endif>Monday &nbsp;&nbsp;&nbsp;&nbsp; 
			                <input type="checkbox" name="working_days[]" value="tuesday" @if($setting->working_days=='tuesday') checked  / @endif>Tuesday &nbsp;&nbsp;&nbsp;&nbsp;
			                <input type="checkbox" name="working_days[]" value="wednesday" @if($setting->working_days=='wednesday') checked  / @endif>Wednesday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                <input type="checkbox" name="working_days[]" value="thursday" @if($setting->working_days=='thursday') checked  / @endif>Thursday &nbsp;&nbsp;&nbsp;&nbsp;
			                <input type="checkbox" name="working_days[]" value="friday" @if($setting->working_days=='friday') checked  / @endif>Friday&nbsp;&nbsp;&nbsp;&nbsp;
			                <input type="checkbox" name="working_days[]" value="saturday" @if($setting->working_days=='saturday') checked  / @endif>Saturday &nbsp;&nbsp;
			                <input type="checkbox" name="working_days[]" value="sunday" @if($setting->working_days=='sunday') checked  / @endif>Sunday &nbsp;&nbsp;&nbsp;&nbsp; 
			              </div> 
					    <div class="form-group">
						  <label>Cost Of Two</label>
						  <input type="number" class="form-control"  placeholder="Enter cost of two" name="cost_for_two" value="{{ $setting->cost_for_two }}">
						</div>
						 
				    </div>
				    <div class="box-footer">
					  <button type="submit" class="btn btn-primary">Submit</button>
				    </div>
				</form>
		    </div>
		</div> 
	</div>
</section>

@endsection