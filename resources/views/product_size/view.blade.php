@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <h3>SIZE</h3>

    <div>
        <a href="{{url('product_size')}}" class="btn btn-primary">BACK</a>
        <br>
        <br>
      </div>
      </div>
  <hr>
<form class="form-horizontal" id="create_category">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Size</label>
    <div class="col-sm-4">
      <input type="text" value="{{$size->product_size}}" name="product_size" class="form-control" placeholder="Enter product category" readonly>
    </div>
  </div>
</form>
</div>
@endsection