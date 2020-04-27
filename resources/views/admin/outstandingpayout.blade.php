@extends('master')
@section('title','Outstanding Payouts') 
@section('main_body')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>View All Outstanding Payouts</b></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Sr.no</th> 
                  <th>Details</th>  
                  <th>Outstanding Balance</th> 
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> 
                <?php $i=1;?> <!-- auto increment--->
                @foreach($forms as $form)
                  <tr> 
                    <td>{{ $i++}}</td> 
                    <td>
                      <b>Restaurant id</b>:{{ $form->userid}}<br> 
                      <b>Name</b>:{{ $form->name}}<BR>
                      <b>Address</b>:{{ $form->address}}<br>
                      <b>Contact No</b>:{{ $form->mobileno}}<br>
                      <b>Email</b>:{{ $form->email}}
                    </td>  
                    <td>{{ $form->outstanding_balance}}</td>  
                    <td> 
                      <a href="{{url('view/'.$form->id)}}"><button class="btn btn-outline-warning">Previous Payment</button></a> 
                      <a href="{{ url('addpay/'.$form->id)}}"><button class="btn btn-danger" type="submit">Release Payment</button></a> 
                    </td> 
                  </tr>            
                @endforeach
                </tr> 
              </tbody> 
              <tfoot>
                <tr>
                  <th>Sr.no</th> 
                  <th>Details</th>  
                  <th>Outstanding Balance</th> 
                  <th>Action</th>
                </tr>
              </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div>
  </div>
</section>
@endsection