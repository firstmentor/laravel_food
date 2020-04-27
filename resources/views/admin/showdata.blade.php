<body style="background-color:#ecf0f5;">
@include('layouts.meta') 
  @include('layouts.css') 
<div class="container-fluid" style="margin-left:20px;">
	<div class="row">
		<h1>{{ucwords($data->title)}}</h1>
		<p style="text-align:justify;">{!! $data->content !!}</p> 
	</div>

</div>
@include('layouts.js') 
</body>