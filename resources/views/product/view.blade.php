@extends('layouts.app')

@section('content')

<div class="container">
 

  <div class="row">
    
    <h3>VIEW PRODUCT</h3>
    <a href="{{url('product_view')}}" class="btn btn-primary">BACK</a>
  </div>

  <hr>

<form class="form-horizontal" id="create_product">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Name</label>
    <div class="col-sm-4">
      <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" placeholder="Enter product name" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Category</label>
    <div class="col-sm-4">
       <input type="text"  name="product_category" value="{{$product->product_category}}" class="form-control" placeholder="Enter product price" readonly>
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Size</label>
    <div class="col-sm-4">
      <input type="text" name="product_size" value="{{$product->product_size}}" class="form-control" placeholder="Enter product price" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Price</label>
    <div class="col-sm-4">
      <input type="text" name="product_price" value="{{$product->product_price}}" class="form-control" placeholder="Enter product price" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Stock</label>
    <div class="col-sm-4">
      <input type="text" name="product_stock" value="{{$product->product_stock}}" class="form-control" placeholder="Enter product stock" readonly>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Desciption</label>
    <div class="col-sm-4">
      <textarea name="product_description" class="form-control" placeholder="Enter product description" readonly>{{$product->product_description}}</textarea>
    </div>
  </div>
</form>

</div>
@endsection