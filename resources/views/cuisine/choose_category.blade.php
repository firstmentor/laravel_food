@extends('master') 
@section('title','Cuisine Category')
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
			<div class="col-md-"></div>
				<div class="col-md-7"> <br>
				    <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title"><b>Choose Cuisine Category</b></h3> 
						</div> 
						<form action="{{url('/cuisine-category')}}"  method="post">
	                        {{csrf_field()}}
						    <div class="box-body">  
							    <?php $count; ?>
				                @if($category->count()>=1)
					                <div class="form-group">
					                  <label>Cuisine Name</label><br>
					                    @foreach($category as $r)
						                    <div class="checkbox-controller">
							                    @foreach($member as $r1) 
							                      <input type="checkbox"  name="categories[]" value="{{ $r->category_name}}" @if(strpos($r1->categories, $r->category_name) !== false) checked @endif> {{$r->category_name}}
							                    @endforeach 
						                    </div>
					                    @endforeach 
					                </div>
				                @endif
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
	<section class="content">
	    <div class="row"> 
			<div class="col-md-"></div>
				<div class="col-md-7"> <br>
				    <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title"> <b>Add Cuisine Category ?<span style="font-size:16px; float:right; color:blue; padding-left:73px;">If you don't find your category ! Add new category</span></b>
						  </h3> 
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