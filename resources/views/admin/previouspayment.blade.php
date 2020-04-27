@extends('master')
@section('title','Previous Payments') 
@section('main_body')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>View All Previous Payments</b></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Sr.no</th> 
                  <th>Amount</th>  
                  <th>Method</th> 
                  <th>Remark</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody> 
                <?php $i=1;?> <!-- auto increment--->
                @foreach($forms as $form)
                  <tr> 
                    <td>{{ $i++}}</td> 
                    <td>{{ $form->amount}}</td>  
                    <td>{{ $form->method}}</td>  
                    <td>{{ $form->remark}}</td>  
                    <td>{{ $form->created_at}}</td>   
                  </tr>            
                @endforeach
                </tr> 
              </tbody> 
              <tfoot>
                <tr>
                  <th>Sr.no</th> 
                  <th>Amount</th>  
                  <th>Method</th> 
                  <th>Remark</th>
                  <th>Date</th>
                </tr>
              </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div>
  </div>
</section>
@endsection