 
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
 
@if(Auth::user()->usertype == 1 && Auth::user()->is_active == 1)  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <!-- <div class="inner">
          <h3>150</h3>
          <p>Total New Order</p>
        </div> -->
        <div class="inner">
          @php
            $ratan = DB::table('profiles')->count('id'); 
          @endphp 
          <!-- <span class="count">{{ $ratan}}</span> -->
          
        <h3><span class="count">{{ $ratan}}</span></h3>

        <p><b style="color:black;">All User</b></p>
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
          <p>Total Delivered Order</p>
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
          @php
            $ratan = DB::table('restaurant')->where('name', DB::table('restaurant')->where('email', Auth::user()->email)->pluck('name')->first())->count(); 
          @endphp
          <h3><span class="count">{{ $ratan}}</span></h3>

          <p>All Cuisine</p>
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
          <p>All Cuisine </p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->
   
@endif
@if(Auth::user()->usertype == 2 && Auth::user()->is_active == 1)  <!-- Small boxes (Stat box) -->
   <h3>Please ! Download an app for login </h3>
@endif
</section> 