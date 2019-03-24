<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Book_category;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $books = Book::all();
        $categories = Book_category::all();
        $auhors = Author::all();
        $data = [
            'users' => $users,
            'books' => $books,
            'categories' => $categories,
            'authors' => $auhors
        ];
        return view('admin',compact('data'));
    }

}
