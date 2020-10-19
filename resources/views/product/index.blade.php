@extends('layouts.app')
<style type="text/css">
  .modal-backdrop.fade.in {
    display: none !important;
  }
</style>

@section('content')

	    <div class="container"><br>

<div class="container">
  <div>
    <a href="{{url('product_create')}}" class="btn btn-primary">Add Product</a>
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
            <!-- <th>SR.No.</th> -->
            <th>PRODUCT NAME</th>
            <th>PRODUCT CATEGORY</th>
            <th>PRODUCT PRIZE</th>
            <th>PRODUCT SIZE</th>
            <th>STOCK</th>
            <th>PRODUCT DESCRIPTION</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          @foreach($product as $key=>$products)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$products->product_category}}</td>
            <td>{{$products->product_price}}</td>
            <td>{{$products->product_size}}</td>
            <td>{{$products->product_stock}}</td>
            <td>{{$products->product_description}}</td>
            <td>
              <a href="{{url('product_edit')}}/{{$products->id}}" class=" btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
              <a href="{{url('product_delete')}}/{{$products->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
              <a href="{{url('product_details')}}/{{$products->id}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


      </div>
</body>
@endsection