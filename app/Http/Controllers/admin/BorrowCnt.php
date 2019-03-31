<?php

namespace App\Http\Controllers\admin;

use App\Models\Author;
use App\Models\Book;
use App\Models\borrow_lists;
use App\Models\Borrows;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowCnt extends Controller
{

    public function index()
    {

        $borrows = Borrows::where('status','=',1)->get();
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

        $hasAlready = borrow_lists::where( 'user_id','=',$request->user_id )->first();

        if(count($hasAlready) < 3){
            borrow_lists::create([
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

        $has = borrow_lists::where( 'user_id','=',$user_id )->where( 'book_id','=',$book_id )->first();

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

    public function borrow_details($borrow)
    {

        $items = borrow_lists::where('borrow_id','=',$borrow)
            ->where('is_borrow','=',1)
            ->get();// dd($items);
        $total = 0;
        foreach ($items as $item){
            $price = $item->book->price*(20/100);
            $total += $price*1;
        }
        $data = [
            'items' => $items,
            'total' => $total
        ];
        return view('admin.borrow.borrow_details',compact('data'));
    }


    public function destroy($id)
    {
        $borrow = Borrows::find($id);
        //dd($borrow);
        Borrows::where('id','=',$id)
            ->update([
                'status' => '0'
            ]);
        session()->flash('success','Dismissed the borrow!!');
        return back();
    }

    public function history()
    {

        $borrows = Borrows::where('status','=',0)->get();
        $users = User::all();
        $books = Book::all();

        $data = [
            'borrows' => $borrows,
            'users' => $users,
            'books' => $books
        ];

        return view('admin.borrow.borrow_history',compact('data'));

    }


}
