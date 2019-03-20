<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class searchCnt extends Controller
{

    public function search($search)
    {
        //$authors = Author::search($search)->get();
        $books = Book::search($search)->get(); //dd(count($book));
        if(!count($books)){
            $authors = Author::search($search)->get(); //return response()->json($authors);
            //dd($authors[0]);
            if ( count($authors) ) {
                $books = Book::search($authors[0]->id)
                    ->where('author_id', $authors[0]->id)
                    ->get();
                foreach ($books as $book){
                    $author = Author::where('id','=',$book->author_id)->first();
                    //echo $author->name;
                    $book['author'] = $author->name;
                }
                return response()->json($books);
            }
            return response()->json(false);
        }
        foreach ($books as $book){
            $author = Author::where('id','=',$book->author_id)->first();
            //echo $author->name;
            $book['author'] = $author->name;
        }

        return response()->json($books);
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


}
