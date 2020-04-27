@extends('master') 
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
		<div class="col-md-3"></div>
			<div class="col-md-7"> <br>
			    <div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Add Cuisine/Dishes</h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<form action="{{url('/menu')}}"  method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
						 
					    <div class="box-body">
					    	<!-- <INPUT TYPE="hidden" NAME="longi" ID="longi" VALUE="">
                            <INPUT TYPE="hidden" NAME="lat" ID="lat" VALUE=""> -->
                            <input type="hidden" name="restaurant_name" value="{{ Auth::user()->name }}">
							<div class="form-group">
							  <label>Cuisine/Dishes Name</label>
							  <input type="text" class="form-control"  placeholder="Enter dish name" name="name">
							</div> 

							<div class="form-group">
							  <label>Serve Type</label><br>
							  <input type="checkbox" name="servetype[]" value="veg" >Veg &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="servetype[]" value="nonveg">Non- Veg 
							</div>

							<div class="form-group">
							  <label>Cuisine/Dish Price</label> 
							  <input type="text" class="form-control"  placeholder="Enter Cuisine/Dish price" name="price"> 
							</div>

							<div class="form-group">
							  <label>Cuisine/Dish Image</label>
							  <input type="file" name="image" required> 
							</div> 

							<div class="form-group">
							  <label>Cuisine/Dish Category</label><br>
							  <input type="checkbox" name="categories[]" value="chinese">Chinese &nbsp;&nbsp;&nbsp;&nbsp; 
							  <input type="checkbox" name="categories[]" value="continental">Continental &nbsp;&nbsp;&nbsp;&nbsp;
							  <input type="checkbox" name="categories[]" value="fastfood">Fast-Food &nbsp;&nbsp;&nbsp;&nbsp; 
							  <input type="checkbox" name="categories[]" value="mughlai">Mughlai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <input type="checkbox" name="categories[]" value="italian">Italian &nbsp;&nbsp;&nbsp;&nbsp; 
							  <input type="checkbox" name="categories[]" value="punjabian">Punjabian&nbsp;&nbsp;&nbsp;&nbsp;
							  <input type="checkbox" name="categories[]" value="southindian">South-Indian &nbsp;&nbsp; 
							  <input type="checkbox" name="categories[]" value="mexican">Mexican &nbsp;&nbsp;&nbsp;&nbsp;
							  <input type="checkbox" name="categories[]" value="american">American &nbsp;&nbsp;&nbsp;&nbsp;  
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