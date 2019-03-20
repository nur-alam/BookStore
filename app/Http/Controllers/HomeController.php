<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ধর্মীয়_বই =  Book::where('category_id',2)->take(4)->get();
        $প্রোগ্রামিং =  Book::where('category_id',4)->take(4)->get();
        $উপন্যাস =  Book::where('category_id',3)->take(4)->get();
        $সায়েন্স =  Book::where('category_id',5)->take(4)->get();
        $data = [
            'ধর্মীয়_বই' => $ধর্মীয়_বই,
            'প্রোগ্রামিং' => $প্রোগ্রামিং,
            'উপন্যাস' => $উপন্যাস,
            'সায়েন্স' => $সায়েন্স,
        ];
        return view('home',compact('data'));
    }



}
