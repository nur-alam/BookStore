<?php

namespace App\Models;

use App\Model\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use App\Models\Borrows;

class borrow_lists extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }
    public function borrow()
    {
        return $this->belongsTo(Borrows::class,'borrow_id');
    }


}
