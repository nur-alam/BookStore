<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bookCnt extends Controller
{

    public function bookdetials(Book $book)
    {

        $data = [
            'book' => $book,
        ];

    	return view('book_details',compact('data'));

    }

    public function cat_wise_books(Book_category $category)
    {

        $cat_books = Book::with('author','category')
                        ->where('category_id','=',$category->id)
                        ->paginate(20);
        $data = [
            'cat_books' => $cat_books,
            'category' => $category
        ];

        return view('cat_wise_books',compact('data'));

    }

}
