@extends('master')
@section('title','Show all Delivery Boy') 
@section('main_body')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>View All Delivery Boy</b></h3>
          <a href="{{url('adddelivery')}}" class="btn btn-sm btn-success" style="float:right;">Add Delivery Boy</a>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>

                <tr>
                  <th>Sr.no</th> 
                  <th>Image</th>
                  <th>Details</th>  
                  <th>Bank-Details</th> 
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> 
                <?php $i=1;?> <!-- auto increment--->
                @foreach($forms as $form)
                  <tr> 
                    <td>{{ $i++}}</td>
                    <!-- <td>
                      @php
                       if(!empty($form->image))
                      { @endphp
                        <img src="{{url('upload/'.$form ->image)}}" style="height: 50px; width: 50px;">
                      @php
                        }
                        else
                        {
                      @endphp
                      <h6>No Image Found</h6>
                      @php 
                        } 
                      @endphp
                    </td>  -->
                    <td>
                      @php
                       if(!empty($form->image))
                      { @endphp
                        <img src="{{asset($form ->image)}}" style="height: 50px; width: 50px;">
                      @php
                        }
                        else
                        {
                      @endphp
                      <h6>No Image Found</h6>
                      @php 
                        } 
                      @endphp
                    </td> 
                    <td>
                      <b>User id</b>:{{ $form->userid}}<br> 
                      <b>Name</b>:{{ $form->name}}<BR>
                      <b>Address</b>:{{ $form->address}}<br>
                      <b>Contact No</b>:{{ $form->mobileno}}<br>
                      <b>Email</b>:{{ $form->email}}
                    </td> 
                     
                    <td><b>Bank Name</b>:{{ $form->bank_name}}<BR>
                      <b>Acct. Holder</b>:{{ $form->bank_account_holder}}<br>
                      <b>Acct. Number</b>:{{ $form->bank_account_no}}<br>
                      <b>IFSC Code</b>:{{ $form->ifsc_code}}
                    </td> 
                     
                    <td> 
                      <a href="{{url('/editdeliveryboy/'.$form->id)}}"><button type="button" class="btn btn-md">Edit</button></a>
                      <form action="{{url('deliveryboy/'.$form->id)}}" method="post" class="pull-right">
                      {{csrf_field()}}
                      {{method_field("DELETE")}}
                      <button class="btn btn-danger" type="submit">DELETE</button>
                    </form>  
                    </td> 
                  </tr>            
                @endforeach
                </tr> 
              </tbody> 
              <tfoot>
                <tr>
                  <th>Sr.no</th> 
                  <th>Image</th>
                  <th>Details</th>  
                  <th>Bank-Details</th> 
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