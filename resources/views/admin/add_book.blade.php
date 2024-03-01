<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
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
        <h1>Add Book</h1>
        <form action="{{url('store_book')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="category">category:</label>
                <select name="categories_id" id="" required>
                    <option value="">Select Category</option>
                    @foreach($data as $data)
                    <option value="{{$data->id}}">
{{$data->cat_title}}
                </option>
                @endforeach

                </select>
            </div>



            <div class="form-group">
                <label for="book_img">Book Image:</label>
                <input type="file" class="form-control-file" id="book_img" name="book_img">
            </div>
            <div class="form-group">
                <label for="author_img">Author Image:</label>
                <input type="file" class="form-control-file" id="author_img" name="auther_img">
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
</div>


</div>
</div>
      @include('admin.footer')
       

  </body>
</html>