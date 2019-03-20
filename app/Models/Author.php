<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Author extends Model
{

    use Searchable;

    public function searchableAs()
    {
        return 'authors';
    }

    protected $guarded = [];

}
