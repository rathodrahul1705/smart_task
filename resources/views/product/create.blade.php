@extends('layouts.app')

@section('content')

<div class="container">
 

  <div class="row">
    
    <h3>ADD PRODUCT</h3>
    <a href="{{url('product_view')}}" class="btn btn-primary">BACK</a>
  </div>

  <hr>

<form class="form-horizontal" id="create_product">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Name</label>
    <div class="col-sm-4">
      <input type="text" name="product_name" class="form-control" placeholder="Enter product name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Category</label>
    <div class="col-sm-4">
      <select class="form-control" name="product_category">
        <option>--select--</option>
        @foreach($category_list as $categoryList)
            <option value="{{$categoryList->product_category}}">{{$categoryList->product_category}}</option>
        @endforeach
      </select>
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Size</label>
    <div class="col-sm-4">
      <select class="form-control" name="product_size">
        <option>--select--</option>
        @foreach($size as $sized)
            <option value="{{$sized->product_size}}">{{$sized->product_size}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Price</label>
    <div class="col-sm-4">
      <input type="text" name="product_price" class="form-control" placeholder="Enter product price">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Stock</label>
    <div class="col-sm-4">
      <input type="text" name="product_stock" class="form-control" placeholder="Enter product stock">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Desciption</label>
    <div class="col-sm-4">
      <textarea name="product_description" class="form-control" placeholder="Enter product description"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>

</div>

<script type="text/javascript">
      $(function() {
          
        $("#create_product").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/product_save")}}',
            headers:{
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },   
            method: 'POST',
            type: 'JSON',
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,

            success: function(obj) {
              if(obj.status ="success") {
                swal({
                    title:'Product saved <b style="color:green;">successfully</b>!',
                    type:'success',
                    
                }).then(e=>{
                window.location.href = "/product_view"

                }).catch(err=>{

                });
              }

            },
            error: function(obj) {

              if (obj.status == 401) {
                swal(
                  'Warning',
                  'You are not Authorized!',
                  'warning'
                );
              }

              
              console.log(obj)
              $(".alert-danger").remove();
              console.log(obj.responseJSON.errors)
              $.each(obj.responseJSON.errors, function(key, val) {
                $('.errors li').append("<span class='alert alert-danger'>"+val+"</span><br/><br/>")
              });
            },

          }) 
      })    
   
  })


</script>

@endsection