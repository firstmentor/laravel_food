@extends('master') 
@section('title','Page editing')
@section('main_body')
  <section class="content">
    <div class="row">
      <?php $count=1; ?>
      @foreach($result as $results)
      <div class="col-md-6">
        <div class="box box-info">
           <div class="box-header"> 
          <div class="box-header with-border">
            <h3 style="font-weight: bold;" class="box-title">{{ $results->title }}</h3>
          </div><!-- /.box-header -->
          </div><!-- /.box-header -->
          <!-- form start -->
            <form class="form-horizontal" action="{{url('details_update',[$results->id] )}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body"> 
                <input type="hidden" name="id" value="{{ $results->id }}" class="form-control">
                <div class="form-group">
                  <div class="col-sm-12"> 
                    <textarea  id="editor{{$count++}}" name="content" rows="10" cols="80">{{ $results->content}}
                    </textarea> 
                    <button style="float: right;" type="submit"  class="btn bg-navy margin"> Update</button>
                  </div>
                </div>
                 
              </div>
            </form>
        </div>
      </div> 
      @endforeach
    </div> 
  </section>
@endsection