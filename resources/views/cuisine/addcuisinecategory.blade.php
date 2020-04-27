@extends('master') 
@section('title','Add cuisine Category')
@section('main_body')
<br><br>
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
		<div class="col-md-"></div>
			<div class="col-md-7">  
			    <div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title"><b>Add Cuisine Category</b></h3> 
					  <a href="{{url('allmenu')}}" class="btn btn-sm btn-success" style="float:right;">All cuisine</a>
					</div><!-- /.box-header -->
					<!-- form start -->
					<form action="{{url('/addcategoryvalue')}}"  method="post" enctype="multipart/form-data">
                        {{csrf_field()}} 
					    <div class="box-body"> 
							<div class="form-group">
							  <label>Add Cuisine Category</label>
							  <input type="text" class="form-control"  placeholder="Enter Category name" name="category_name">
							</div>   
						    <div class="form-group">
								<label>Pic</label> <span style="float:right; color:red;"><b>Select 512*512 size image</b></span>
								 <input type="file" name="category_image" class="form-control" required> 
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