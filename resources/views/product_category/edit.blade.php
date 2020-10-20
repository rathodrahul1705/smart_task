@extends('layouts.app')

@section('content')

<div class="container">
 

  <div class="row">
    
    <h3>EDIT CATEGORY</h3>
    <a href="{{url('product_category')}} " class="btn btn-primary">BACK</a>
  </div>

  <hr>

<form class="form-horizontal" id="update_category">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Category</label>
    <div class="col-sm-4">
      <select class="form-control" name="product_category">
        @foreach($category_list as $categoryList)
            <option value="{{$categoryList->product_category}}"  {{($categoryList->id == $category->id) ? 'selected' : '' }}>{{$categoryList->product_category}}</option>
        @endforeach
      </select>
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
$('table').DataTable();
</script>

<script type="text/javascript">
      $(function() {
          
        $("#update_category").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/product_category_update")}}/{{$cat_id}}',
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
                    title:'Category updated <b style="color:green;">successfully</b>!',
                    type:'success',
                    
                }).then(e=>{
                window.location.href = "/product_category"

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