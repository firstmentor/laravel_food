@extends('master')
@section('title','Show all User') 
@section('main_body')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>View All Users</b></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Sr.no</th> 
                  <th>Name</th>
                  <th>Email</th>  
                  <th>Mobile No</th> 
                  <th>Applied refer code</th>
                  <th>Refer Code</th>
                  <th>OTP</th>
                </tr>
              </thead>
              <tbody> 
                <?php $i=1;?> <!-- auto increment--->
                @foreach($forms as $form)
                  <tr> 
                    <td>{{ $i++}}</td>
                    <td>{{$form->name}}</td>
                    <td>{{$form->email}}</td>
                    <td>{{$form->mobileno}}</td>
                    <td>{{$form->applied_refer_code}}</td>
                    <td>{{$form->refer_code}}</td>
                    <td>{{$form->otp}}</td>

                  </tr> 
                @endforeach 
              </tbody> 
              <tfoot>
                <tr>
                  <th>Sr.no</th> 
                  <th>Name</th>
                  <th>Email</th>  
                  <th>Mobile No</th> 
                  <th>Applied refer code</th>
                  <th>Refer Code</th>
                  <th>OTP</th>
                </tr>
              </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div>
  </div>
</section>
@endsection