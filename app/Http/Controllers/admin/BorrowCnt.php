<?php

namespace App\Http\Controllers\admin;

use App\Models\Author;
use App\Models\Book;
use App\Models\borrow_items;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowCnt extends Controller
{

    public function index()
    {

        $borrows = borrow_items::where('status','=',0)->get();
        $users = User::all();
        $books = Book::all();

        $data = [
            'borrows' => $borrows,
            'users' => $users,
            'books' => $books
        ];

        return view('admin.borrow.index',compact('data'));

    }

    public function store(Request $request)
    {

        $rules = [
            'book_id' => 'required|integer',
            'user_id' => 'required|integer'
        ];

        $this->validate($request,$rules);

        $hasAlready = borrow_items::where( 'user_id','=',$request->user_id )->first();

        if(count($hasAlready) < 3){
            borrow_items::create([
                'user_id' => $request->user_id,
                'book_id' => $request->book_id
            ]);
            session()->flash('success','Book added to your borrow list, make sure return this book withing 15 days');
            return back();
        }

        return redirect()->back()->withErrors([
            'errors' => 'The user borrow two book already! Anyone is not allowed to borrow more than two book same times!'
        ]);

    }


    public function create()
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


    public function update($user_id,$book_id)
    {

        $has = borrow_items::where( 'user_id','=',$user_id )->where( 'book_id','=',$book_id )->first();

        if($has){
            borrow_items::where('user_id','=',$user_id)
                        ->where('book_id','=',$book_id)
                        ->update([
                            'status' => 1
                        ]);
            session()->flash('success','Book returned');
            return back();
        }

        return back()->withErrors([
            'errors' => 'Borrow book not found'
        ]);

    }


    public function destroy($id)
    {
        //
    }
}
