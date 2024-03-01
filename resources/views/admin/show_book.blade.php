<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table{
            align-justify:center;
            text-align:center;
            margin:auto;
        }
    .center{
          margin:auto;
          text-align: center;
          width: 50%;
          margin-top:50px;
          border:1px solid white;
        }
        th{
          background-color: #f2f2f2; 
          padding: 10px;
        }
        tr{
          border:1px solid white;
          padding: 10px;
        }
        td{
          border:1px solid white;
          padding: 10px;
        }
        .image{
          width: 80px;
          width: 60px;
          border-radius:60%;
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
            <div>
                <table>
                <tr>
                <th>Title</th>
                <th>Auther</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Descibtion</th>
                <th>Category</th>
                <th>Auther Img</th>
                <th>Book Img</th>
                <th>Delete</th>
                <th>Update</th>
                </tr>
                @foreach($data as $book)
                <tr>
                    <td>{{$book->title}}</td>
                    <td>{{$book->auth_namr}}</td>
                    <td>{{$book->price}}</td>
                    <td>{{$book->quantity}}</td>
                    <td>{{$book->describtion}}</td>
                    <td>{{$book->category->cat_title}}</td>

                    <td>
                      <img src="author/{{$book->auther_img}}" class="image" >
                  
                  </td>
                    <td>
                    <img src="book/{{$book->book_img}}" class="image" >

                    </td>
                    <td>
                    <a href="{{url('book_delete', $book->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>

                    </td>
                    <td>
                    <a href="{{url('book_update', $book->id)}}" class="btn btn-info">Update</a>

                    </td>
                </tr>
                @endforeach
                </table>
            </div>
</div>
</div>
</div>

      @include('admin.footer')
       

  </body>
</html>