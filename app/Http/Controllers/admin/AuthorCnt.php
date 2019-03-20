<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorCnt extends Controller
{

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
        $author_created = Author::create([
            'name' => strtolower($request->name)
        ]);

        if($author_created){
            session()->flash('success','author created.');
            return redirect()->back();
        }

        return back()->withErrors([
            'errors' => "author not created!!"
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
