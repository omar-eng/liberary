<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            margin:auto;
        }
        .cat_label{
            font-size:30px;
            font-weight:bold;
            padding: 30px;
            color:white;
        }
        .center{
          margin:auto;
          text-align: center;
          width: 50%;
          margin-top:50px;
          border:1px solid white;
        }
        th{
          background-color: #f2f2f2; /* Light gray background */
          padding: 10px;
        }
        tr{
          border:1px solid white;
          padding: auto;
        }
    </style>
  </head>
  <body>
    <header class="header">   
    @include('admin.header')

    </header>
    <div class="d-flex align-items-stretch">
      @include('admin.side_bar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="div_center">
<div>
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session()->get('message') }}
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    </div>
    @endif
</div>

<h1 class="cat_label">Add Category</h1>

<form action="{{url('add_category')}}" method="Post">
    @csrf
<label class="h6" for="">Ctegory Name</label>
<input type="text" name="category" required>

<input class="btn btn-primary ml-2" type="submit" value="Add Category">
</form>

<div>
  <table class="center">
    <tr>
      <th>Categories</th>
      <th>Action</th>
    </tr>
    @foreach($data as $data)
    <tr>
      <td>{{$data->cat_title}}</td>
      <td>
      <a href="{{url('cat_update', $data->id)}}" class="btn btn-info">Update</a>
      <a href="{{url('cat_delete', $data->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>


</div>
</div>
</div>
</div>
      @include('admin.footer')
       
  </body>
</html>