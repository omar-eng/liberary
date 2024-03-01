<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .center {
            margin: auto;
            text-align: center;
            width: 50%;
            margin-top: 50px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-success .close {
            color: #31708f;
            opacity: 0.8;
        }

        .alert-success .close:hover {
            color: #31708f;
            opacity: 1;
        }

        .page-content {
            margin-left: 250px; /* Adjust this value according to your sidebar width */
            padding: 20px;
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
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </div>
                        @endif
                    </div>
                    <h1 class="center">Book Update</h1>

                    <form action="{{url('update_book', $book->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" id="author" name="author" value="{{ $book->auth_namr }}" required>
                        </div>
                        <div class="form-group">
                            <label for="[price]">[price]:</label>
                            <input type="text" class="form-control" id="[price]" name="price" value="{{ $book->price }}" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">quantity:</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $book->describtion }}</textarea>
                        </div>

                        <div>
                        <label for="category">category:</label>
                     <select name="categories_id" id="">
                        <option value="{{$book->category->id}}">{{$book->category->cat_title}}</option>
                        @foreach($category as $cat)
<option value="{{$cat->id}}">{{$cat->cat_title}}</option>
                        @endforeach
                     </select>

                        </div>

                        <div>
                            <label for="">Auther Image</label>
                            <img style="width:80px ; height=80px; margin:10px" 
                            src="/author/{{$book->auther_img}}">
                        </div>
                        <div class="form-group">
                <label for="author_img">Author Image:</label>
                <input type="file" class="form-control-file" id="author_img" name="auther_img">
            </div>
                        <div>
                            <label for="">book Image</label>
                            <img style="width:80px ; height=80px; margin:10px" 
                            src="/book/{{$book->book_img}}">
                        </div>
         <div class="form-group">
                <label for="book_img">Book Image:</label>
                <input type="file" class="form-control-file" id="book_img" name="book_img">
            </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>
</html>
