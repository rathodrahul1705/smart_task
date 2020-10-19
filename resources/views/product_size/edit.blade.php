@extends('layouts.app')

@section('content')

<div class="container">
 

  <div class="row">
    
    <h3>EDIT SIZE</h3>
    <div>
        <a href="{{url('product_size')}}" class="btn btn-primary">BACK</a>
        <br>
        <br>
      </div>

  </div>

  <hr>

<form class="form-horizontal" id="create_size">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Product Size</label>
    <div class="col-sm-4">
      <select class="form-control" name="product_size">
        @foreach($size_list as $sizeList)
            <option value="{{$sizeList->product_size}}"  {{($sizeList->id == $siz_id) ? 'selected' : '' }}>{{$sizeList->product_size}}</option>
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
      $(function() {
          
        $("#create_size").on("submit", function(e) {
            e.preventDefault()
          $.ajax({
            url: '{{url("/product_size_update")}}/{{$siz_id}}',
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
                    title:'Size updated <b style="color:green;">successfully</b>!',
                    type:'success',
                    
                }).then(e=>{
                window.location.href = "/product_size"

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