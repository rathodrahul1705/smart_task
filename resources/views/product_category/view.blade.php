@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <h3>CATEGORY LIST</h3>
  </div>
  <hr>
<form class="form-horizontal" id="create_category">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Category</label>
    <div class="col-sm-4">
      <input type="text" value="{{$category->product_category}}" name="product_category" class="form-control" placeholder="Enter product category" readonly>
    </div>
  </div>
</form>
</div>
@endsection