<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
             .center{
          margin:auto;
          text-align: center;
          width: 50%;
          margin-top:50px;
        }
    </style>
  </head>
  <body>
    <header class="header">   
    @include('admin.header')

    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.side_bar')

      <!-- Sidebar Navigation end-->

      <div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
        <div>
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session()->get('message') }}
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    </div>
    @endif
</div>
            <h1 class="center">Update Category</h1>
            <form action="{{url('update_category', $data->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="cat_title">Category Title:</label>
                    <input type="text" class="form-control" id="cat_title" name="cat_title" value="{{$data->cat_title}}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>



      @include('admin.footer')
       

  </body>
</html>