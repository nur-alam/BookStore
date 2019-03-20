<?php

namespace App\Models;



use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
