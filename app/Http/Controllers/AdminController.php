<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'admin') {
                return view('admin.index');
            } elseif ($usertype == 'user') {
                $data = Book::all();
                return view('home.index', compact('data'));
            } else {
                return redirect()->route('login');
            }
        }
    }

    public function category_page()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        //create a new category record
        $data = new Category;
        $data->cat_title = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'category added successfully');

    }
    public function cat_delete($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'deleted successfully');
    }
    public function cat_update($id)
    {
        $data = Category::find($id);
        return view('admin.cat_update', compact('data'));


    }
    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->cat_title = $request->cat_title;
        $data->save();

        return redirect('/category_page')->with('message', 'Category updated successfully');

    }

    public function add_book()
    {
        $data = Category::all();
        return view('admin.add_book', compact('data'));
    }
    public function store_book(Request $request)
    {
        $data = new Book;
        $data->title = $request->title;

        $data->auth_namr = $request->author;
        $data->price = $request->price;
        $data->describtion = $request->description;
        $data->quantity = $request->quantity;

        // Handle image uploads

        $book_image = $request->book_img;
        $author_image = $request->auther_img;

        if ($book_image) {
            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();
            $request->book_img->move('book', $book_image_name);
            $data->book_img = $book_image_name;
        }
        if ($author_image) {
            $author_image_name = time() . '.' . $author_image->getClientOriginalExtension();
            $author_image->move('author', $author_image_name);
            $data->auther_img = $author_image_name;
        }

        $data->categories_id = $request->categories_id;

        $data->save();

        return redirect('/show_book')->with('message', 'Book added successfully');
    }

    public function show_book()
    {
        $data = Book::all();
        return view('admin.show_book', compact('data'));
    }
    public function book_delete($id)
    {
        $data = Book::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Book deleted successfully');

    }

    public function book_update($id)
    {
        $book = Book::find($id);
        $category = Category::all();
        return view('admin.book_update', compact('book', 'category'));
    }
    public function update_book($id, Request $request)
    {
        $data = Book::find($id);
        $data->title = $request->title;

        $data->auth_namr = $request->author;
        $data->price = $request->price;
        $data->describtion = $request->description;
        $data->quantity = $request->quantity;

        // Handle image uploads

        $book_image = $request->book_img;
        $author_image = $request->auther_img;

        if ($book_image) {
            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();
            $request->book_img->move('book', $book_image_name);
            $data->book_img = $book_image_name;
        }
        if ($author_image) {
            $author_image_name = time() . '.' . $author_image->getClientOriginalExtension();
            $author_image->move('author', $author_image_name);
            $data->auther_img = $author_image_name;
        }

        $data->categories_id = $request->categories_id;

        $data->save();
        return redirect('/show_book')->with('message', 'Book updated successfully');

    }

}

