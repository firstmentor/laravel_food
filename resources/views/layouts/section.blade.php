 
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section> 
<section class="content">
@if(Auth::user()->usertype == 0 && Auth::user()->is_active == 1)  <!-- Small boxes (Stat box) -->
  <section class="content"><!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            @php
              $user = DB::table('restaurant')->count('id'); 
            @endphp
            <h3><span class="count">{{ $user}}</span></h3>
            <p>All restaurants</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>  
      <!--- end---->
      <div class="col-lg-6 col-xs-6"> 
        <div class="small-box bg-yellow">
          <div class="inner">
            @php
              $user = DB::table('profiles')->count('id'); 
            @endphp 
            <h3><span class="count">{{ $user}}</span></h3>
            <p>All User</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>   
  </section> 
@endif 

@if(Auth::user()->usertype == 1 && Auth::user()->is_active == 0)  <!-- Small boxes (Stat box) -->
  <section class="content"><!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>150</h3>
            <p>New Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>
            <p>Delivered Order</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>44</h3>
            <p>All User</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>
            <p>All Add Cuisine</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->


      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>150</h3>
            <p>Total Order's Amount<BR>Remaining Balance</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
       <!-- /.row --> 
  </section> 
@endif

@if(Auth::user()->usertype == 1 && Auth::user()->is_active == 3)  <!-- Small boxes (Stat box) -->
   
<div class="col-md-3"></div>
<div class="col-md-6" style="margin-top:50px;"> <br>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Waiting For Approval</h3>
    </div> 
  </div>
</div>
 
@endif 

@if(Auth::user()->usertype == 2 && Auth::user()->is_active == 1)  <!-- Small boxes (Stat box) -->
   <h3>Please ! Download an app for login </h3>
@endif
</section> 