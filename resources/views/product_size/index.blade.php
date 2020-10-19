@extends('layouts.app')
<style type="text/css">
  .modal-backdrop.fade.in {
    display: none !important;
  }
</style>

@section('content')



<div class="container">
  <div>
    <a href="{{url('product_size_create')}}" class="btn btn-primary">Add Size</a>
    <br>
    <br>
    @if ($message = Session::get('warning'))
<div class="alert alert-danger alert-block col-sm-4">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif
  </div>

  <br>
  <div class="row">
    <div class="col-xs-12">
      <table summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">
        <thead>
          <tr>
            <th>SR.No.</th>
            <th>PRODUCT SIZE</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          @foreach($size as $key=>$sizes)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$sizes->product_size}}</td>
            <td>
              <a href="{{url('product_size_edit')}}/{{$sizes->id}}" class=" btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
              <a href="{{url('product_size_delete')}}/{{$sizes->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
              <a href="{{url('product_size_view')}}/{{$sizes->id}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


      </div>
@endsection