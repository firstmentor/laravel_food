@extends('commonmaster') 
@section('main_body')
<section class="content">
    <div class="row"> 
		<div class="col-md-3"></div>
			<div class="col-md-7"> <br>
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Who Are You ?</h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<form action="{{url('update')}}"  method="post">
			          {{csrf_field()}} 
					   <div class="box-body" style="padding-right:20px;">
					   	    
							<div class="form-group"> 
							  <input id="rest" type="radio" name="type" value="1" checked required>&nbsp;&nbsp;&nbsp;
							  <label for="rest"><h4><b>Restaurant</b></h4></label>
							</div>
							<div class="form-group">
							  <input id="delivery" type="radio" name="type" value="2" required>&nbsp;&nbsp;&nbsp;
							  <label for="delivery"><h4><b>Delivery Boy</b></h4></label> 
							</div> 
					    </div><!-- /.box-body --> 
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