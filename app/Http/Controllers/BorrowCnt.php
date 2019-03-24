<?php

namespace App\Http\Controllers;

use App\Models\borrow_lists;
use App\Models\Borrows;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowCnt extends Controller
{

    public function index()
    {

        //dd(date_create('2019-03-09 11:49:31'));

        //$borrows = borrow_lists::where('user_id','=',auth()->id())->get(); //dd($borrows);

        //$date1 = date_create('2019-03-09 11:49:31');
        //$date2 = date_create('now');

        //difference between two dates
        //$diff = date_diff($date1,$date2); echo $diff->format("%a") - 1;
        //count days
        //echo 'Days Count - '.$diff->format("%a"); exit();

        $orders = borrow_lists::where('user_id','=',auth()->id())->where('borrow_id','=',null)->where('is_borrow','=',0)->get();
        //dd($orders);
        $total = 0;
        foreach ($orders as $order){
            $price = $order->book->price*(20/100);
            $total += $price*1;
        }
        $data = [
            'orders' => $orders,
            'total' => $total
        ];
        if($orders){
            return view('borrow.index',compact('data'));
        }

    }

    public function borrow_list()
    {

        $borrows = borrow_lists::where('user_id','=',auth()->id())
                                ->where('borrow_id','!=',null)
                                ->where('is_borrow','=',1)
                                ->where('disable','=',0)
                                ->get();
        //dd($orders);
        $total = 0;
        foreach ($borrows as $borrow){
            $price = $borrow->book->price*(20/100);
            $total += $price*1;
        }


        $data = [
            'borrows' => $borrows,
            'total' => $total
        ];
        return view('borrow.borrow_lists',compact('data'));

    }

    public function store(Request $request)
    {

        //dd($request->all());

        $rules = [
            'book_id' => 'required'
        ];

        $this->validate($request,$rules);

        $hasAlreadyThisBook = borrow_lists::where( 'user_id','=',auth()->id() )
                                    ->where('book_id','=',$request->book_id)
                                    ->where('is_borrow','=',0)
                                    ->first();
        if($hasAlreadyThisBook){
            return redirect()->back()->withErrors([
                'errors' => 'This book already in your borrow list.'
            ]);
        }

        $hasAlready = borrow_lists::where( 'user_id','=',auth()->id() )->first();

        if(count($hasAlready) < 3){
            borrow_lists::create([
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

    public function placeborrow()
    {

        $borrow_created = Borrows::create([
            'user_id' => auth()->id()
        ]);
        $orders = borrow_lists::where('user_id','=',auth()->id())->where('is_borrow','=',0)->get();
        if($orders){
            borrow_lists::where('user_id','=',auth()->id())
                ->where('is_borrow','=',0)
                ->update([
                    'borrow_id' => $borrow_created->id,
                    'is_borrow' => 1
                ]);
            session()->flash('success','Thanks, for borrow books.');
            return back();
        }
        session()->flash('success','You have no books in your borrow list yet!');
        return back();
    }

    public function destroy($id)
    {
        $is_order = borrow_lists::find($id);
        //dd($is_order);
        if($is_order) {
            borrow_lists::destroy($id);
            session()->flash('success','Borrow book deleted');
            return back();
        }
        return back()->withErrors([
            'errors' => 'borrow book not found!'
        ]);
    }


}
