@extends('master') 
@section('title','All Order')
@section('main_body')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>View All Order</b></h3>
          <a href="{{url('neworder')}}" class="btn btn-sm btn-success" style="float:right;">New Order</a>
        </div><!-- /.box-header -->

        <script type="text/javascript">
          setTimeout(function(){
            location.reload();
          },20000);
        </script>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Sr.no</th>
                  <th>Order Id</th>
                  <th>Item Name</th>
                  <th>Item Quantity</th>
                  <th>Item Price</th>
                  <th>Total Price Of Item</th> 
                </tr>
              </thead>
              <tbody> 
                <?php $i=1;?> <!-- auto increment--->
                @foreach($forms as $form)
                  <tr> 
                    <td>{{ $i++}}</td>
                    <td>{{ $form->order_id}}</td> 
                    <td>{{ $form->item_name}}</td>  
                    <td>{{ $form->item_quantity}}</td> 
                    <td>{{ $form->item_price}}</td>  
                    <td>{{ $form->total_item_price}}</td> 
                  </tr>            
                @endforeach 
              </tbody>
              <tfoot>
                <tr>
                  <th>Sr.no</th>
                  <th>Order Id</th>
                  <th>Item Name</th>
                  <th>Item Quantity</th>
                  <th>Item Price</th>
                  <th>Total Price Of Item</th> 
                </tr>
              </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div>
  </div>
</section>
@endsection