@extends('layouts.app')
<style type="text/css">
  .modal-backdrop.fade.in {
    display: none !important;
  }
</style>

@section('content')

<div class="container">
  <div>
    <a href="{{url('product_category_create')}}" class="btn btn-primary">Add Category</a>
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
            <th>SR.NO.</th>
            <th>PRODUCT CATEGORY</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody >
          @foreach($category as $key=>$categories)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$categories->product_category}}</td>
            <td>
              <a href="{{url('product_category_edit')}}/{{$categories->id}}" class=" btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
              <a href="{{url('product_category_delete')}}/{{$categories->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
              <a style="margin:5px;" href="{{url('product_category_list')}}/{{$categories->id}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
@endsection