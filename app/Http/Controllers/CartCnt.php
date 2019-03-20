<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\cart_items;
use App\Models\Orders;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartCnt extends Controller
{

    public function index()
    {
        $orders = cart_items::where('user_id','=',auth()->id())->where('is_order','=',0)->get(); //dd($orders);
        $total = 0;
        $total = 0;
        foreach ($orders as $order){
            $qty = $order->quantity;
            $price = $order->book->price;
            $total += $price*$qty;
        }
        $data = [
            'orders' => $orders,
            'total' => $total
        ];
        return view('cart.index',compact('data'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $rules = [
            'book_id' => 'required',
        ];

        $this->validate($request,$rules);

        $hasAlready = cart_items::where('book_id','=',$request->book_id)
                        ->where('is_order','=',0)->first();
        $book = Book::where('id','=',$request->book_id)->first();

        if($hasAlready){
            session()->flash('success','Book Already added to your cart!');
        }else{
            cart_items::create([
                'user_id' => auth()->user()->id,
                'book_id' => $request->book_id,
                'quantity' => 1,
                'price' => $book->price
            ]);
            session()->flash('success','Book added to your cart!');
        }

        return redirect()->back();
    }

    public function update(Request $request, $order)
    {
        $updatedorder = cart_items::find($order);
        //return response()->json($updatedorder);
        if($order){
            cart_items::where('id','=',$order)
                    ->update(
                        ['quantity' => $request->qty]
                    );
            return response()->json(true);
        }
        return response()->json(false);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }




    public function destroy($id)
    {
        $is_order = cart_items::find($id);
        if($is_order) {
            cart_items::destroy($id);
            session()->flash('success','Cart deleted');
            return back();
        }
        return redirect()->withErrors([
            'errors' => 'cart items not found!'
        ]);
    }




    public function placeorder()
    {
        $order_created = Orders::create([
            'user_id' => auth()->id()
        ]);
        $orders = cart_items::where('user_id','=',auth()->id())->where('is_order','=',0)->get();
        if($orders){
            cart_items::where('user_id','=',auth()->id())
                ->where('is_order','=',0)
                ->update([
                    'order_id' => $order_created->id,
                    'is_order' => 1
                ]);
            session()->flash('success','Thanks, for ordering books.');
            return back();
        }
        session()->flash('success','You have no book in your cart yet!');
        return back();
    }

    public function order_list()
    {
        $orders = cart_items::where('user_id','=',auth()->id())->where('order_id','!=',null)->where('is_order','=',1)->get();
        //dd($orders);
        $total = 0;
        foreach ($orders as $order){
            $qty = $order->quantity;
            $price = $order->book->price;
            $total += $price*$qty;
        }
        $data = [
            'orders' => $orders,
            'total' => $total
        ];
        if($orders){
            return view('cart.order_lists',compact('data'));
        }
    }




}
