<?php

namespace App\Http\Controllers;

use App\Models\borrow_items;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowCnt extends Controller
{

    public function index()
    {

        //dd(date_create('2019-03-09 11:49:31'));

        $borrows = borrow_items::where('user_id','=',auth()->id())->get(); //dd($borrows);

        $date1 = date_create('2019-03-09 11:49:31');
        $date2 = date_create('now');

//difference between two dates
        $diff = date_diff($date1,$date2); echo $diff->format("%a") - 1;
//count days
        //echo 'Days Count - '.$diff->format("%a"); exit();


        $data = [
            'borrows' => $borrows,
        ];
        return view('borrow.index',compact('data'));

    }

    public function store(Request $request)
    {

        $rules = [
            'book_id' => 'required'
        ];

        $this->validate($request,$rules);

        $hasAlready = borrow_items::where( 'user_id','=',auth()->id() )->first();

        if(count($hasAlready) < 3){
            borrow_items::create([
                'user_id' => auth()->id(),
                'book_id' => $request->book_id
            ]);
            session()->flash('success','Book added to your borrow list, make sure return this book withing 15 days');
            return back();
        }

        return redirect()->back()->withErrors([
            'errors' => 'You borrow two book already! Anyone is not allowed to borrow more than two book same times!'
        ]);

    }

}
