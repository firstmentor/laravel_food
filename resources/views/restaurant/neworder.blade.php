@extends('master') 
@section('title','All new order')
@section('main_body')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>View All New Order</b></h3>
          <a href="{{url('allorder')}}" class="btn btn-sm btn-success" style="float:right;">All Order</a>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Sr.no</th> 
                  <th>User Id</th>
                  <th>Amount</th>
                  <th>Delivery Charge</th>
                  <th>Restaurant Charge</th>
                  <th>Order Status</th> 
                </tr>
              </thead>
              <tbody> 
                <?php $i=1;?> <!-- auto increment--->
                @foreach($forms as $form)
                  <tr> 
                    <td>{{ $i++}}</td> 
                    <td>{{ $form->user_id}}</td> 
                    <td>{{ $form->order_amount}}</td>  
                    <td>{{ $form->delivery_charge}}</td>
                    <td>{{ $form->restaurant_charge}}</td> 
                    <!-- <td>{{ $form->order_status}}</td> -->
                    <td>
                      <form action="{{url('order1')}}" method="post">
                         {{csrf_field()}}
                        <label>Status</label>
                       
                        <input type="hidden" name="id" value="{{ $form->id }}" >
                        <select class="form-contro" name="order_status">
                          <option value="1" class="bg-info" @if($form->order_status == 1) selected @endif><button class="btn btn-lg bg-info">New Order</button></option>
                          <option value="2" class="bg-danger" @if($form->order_status == 2) selected @endif><button class="btn btn-lg bg-info">Order Being Prepared</button></option>
                          <option value="3" class="bg-success" @if($form->order_status == 3) selected @endif><button class="btn btn-lg bg-info">Dispatched</button></option>
                          <!-- <option value="4" class="bg-warning" @if($form->order_status == 4) selected @endif><button class="btn btn-lg bg-info">Delivered</button></option> --><!-- 
                          <option value="4" class="bg-primary" @if($form->order_status == 4) selected @endif>Not Placed</option>                -->
                        </select> 
                         <input type="submit" name="submit" value="Change" class="btn btn-primary">
                      </form>
                    </td>  
                  </tr>            
                @endforeach 
              </tbody>
              <tfoot>
                <tr>
                  <th>Sr.no</th> 
                  <th>User Id</th>
                  <th>Amount</th>
                  <th>Delivery Charge</th>
                  <th>Restaurant Charge</th>
                  <th>Order Status</th> 
                </tr>
              </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div>
  </div>
</section>
@endsection