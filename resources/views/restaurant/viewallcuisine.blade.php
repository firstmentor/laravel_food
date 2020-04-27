@extends('master') 
@section('title','Show all Cuisine')
@section('main_body')
<section class="content">
  <div class="row">
    <div class="col-md-12 col-sm-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">View All Cuisine</h3>
          <a href="{{url('menu')}}" class="btn btn-sm btn-success" style="float:right;">Add cuisine</a>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sr.no</th>
                  <th>Name</th>
                  <th>Serve Type</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Categories</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> 
                <?php $i=1;?> <!-- auto increment--->
                @foreach($forms as $form)
                  <tr> 
                    <td>{{ $i++}}</td>
                    <td>{{ $form->name}}</td>  
                    <td>{{ $form->servetype}}</td> 
                    <td>{{ $form->price}}</td> 
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
                    <td>{{ $form->categories}}</td>

                    @if($form->status==1)
                    <td> 
                      <a href="{{url('changestatus/'.$form->id.'/0')}}"><span class="btn btn-danger">Deactivate</span></a>
                    </td>
                    @else 
                    <td> 
                      <a href="{{url('changestatus/'.$form->id.'/1')}}"><span class="btn btn-success">activate</span></a>
                    </td>
                    @endif
                    <td> 
                    <a href="{{url('/editcuisine/'.$form->id)}}"><button type="button" class="btn btn-md">Edit</button></a>
                    <form action="{{url('menu/'.$form->id)}}" method="post" class="pull-right">
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
                  <th>Name</th>
                  <th>Serve Type</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Categories</th>
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