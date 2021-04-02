<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded =[]; // prevent laravel from stopping us
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
