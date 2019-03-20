<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookCatCnt extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $book_created = Book_category::create([
            'name' => strtolower($request->name)
        ]);

        if($book_created){
            session()->flash('success','book category created.');
            return redirect()->back();
        }

        return back()->withErrors([
            'errors' => "book category not created!!"
        ]);
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
