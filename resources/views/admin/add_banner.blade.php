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
					  <h3 class="box-title"><b>Add Banners</b></h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<form action="{{url('/addbanner')}}"  method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
						 
					    <div class="box-body"> 
							 
							
							<div class="form-group">
							  <label>Title</label>
							  <input type="text" class="form-control"  placeholder="Enter Title" name="title" required>
							</div>
							<div class="form-group">
							  <label>Pic</label>
							  <input type="file" name="image" class="form-control" required> 
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