<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Models\Book;
use App\Models\cart_items;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class orderCnt extends Controller
{


    public function index()
    {
          $orders = Orders::where('status','=',1)->get();

//        $orders = DB::table('users')
//                        ->join('orders', 'users.id','=','orders.user_id')
//                        ->join('books','orders.book_id','=','books.id')
//                        ->join('authors','books.author_id','=','authors.id')
//                        ->join('book_categories','books.category_id','=','book_categories.id')
//                        ->select('users.id','users.name as username','users.email','users.image','books.name as bookname','books.image as bookimg','books.price','books.author_id as author','books.category_id as category','orders.user_id','orders.book_id','orders.qty','authors.name as author_name','book_categories.name as category_name')
//                        ->orderBy('orders.id','desc')
//                        ->get();
        $data = [
            'orders' => $orders
        ];
        return view('admin.order.index',compact('data'));
        //return response()->json($orders);
    }

    public function order_details($order)
    {
        $items = cart_items::where('order_id','=',$order)
                                ->get(); //dd($items);
        $total = 0;
        foreach ($items as $item){
            $qty = $item->quantity;
            $price = $item->book->price;
            $total += $price*$qty;
        }
        $data = [
            'items' => $items,
            'total' => $total
        ];
        return view('admin.order.order_details',compact('data'));
    }

    public function history()
    {
        $orders = Orders::where('status','=',0)->get();
        $users = User::all();
        $books = Book::all();

        $data = [
            'orders' => $orders,
            'users' => $users,
            'books' => $books
        ];

        return view('admin.order.order_history',compact('data'));
    }

    public function destroy($id)
    {
        $borrow = Orders::find($id);

        Orders::where('id','=',$id)
            ->update([
                'status' => '0'
            ]);
        session()->flash('success','Dismissed the order!!');
        return back();
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


}
