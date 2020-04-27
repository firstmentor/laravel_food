@extends('master')
@section('title','Show all Previouspayment') 
@section('main_body')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">View All Previous Payments</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Sr.no</th> 

                  <th>Date</th>
                  <th>Amount</th>  
                  <th>Method</th>  
                </tr>
              </thead>
              <tbody> 
                <?php $i=1;?> <!-- auto increment--->
                @foreach($forms as $form)
                  <tr> 
                    <td>{{ $i++}}</td> 
                    <td>{{ $form->created_at}}</td>  
                    <td>{{ $form->amount}}</td>  
                    <td>{{ $form->method}}</td> 
                  </tr>            
                @endforeach
                </tr> 
              </tbody> 
              <tfoot>
                 <tr>
                  <th>Sr.no</th> 

                  <th>Date</th>
                  <th>Amount</th>  
                  <th>Method</th>  
                </tr>
              </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div>
  </div>
</section>
@endsection