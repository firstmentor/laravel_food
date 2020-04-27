@extends('commonmaster') 
@section('main_body')

 <section class="content">
    <div class="row"> 
		<div class="col-md-"></div>
			<div class="col-md-7"> <br>
			    <div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Add Cuisine/Dishes</h3> 
					   
					</div><!-- /.box-header -->
					<!-- form start -->
					<form action="{{url('/submit')}}"  method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
						 
					    <div class="box-body">
					    	<div class="form-group">
							  <label> Email</label>
							  <input type="text" class="form-control"  placeholder="Enter dish name" name="name" value="{{Auth::user()->email}}">
							</div>  
							<div class="form-group">
							  <label>Old </label>
							  <input type="text" class="form-control"  placeholder="Enter dish name" name="old" value="{{Auth::user()->password}}">
							</div> 
							<div class="form-group">
							  <label>New</label>
							  <input type="text" class="form-control"  placeholder="Enter dish name" name="password">
							</div> 
							<div class="form-group">
							  <label>Confirm</label>
							  <input type="text" class="form-control"  placeholder="Enter dish name" name="cnf_password">
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