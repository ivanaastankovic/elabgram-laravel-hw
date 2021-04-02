<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct() // for required authorisation
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
   //         'another'=>'', // za ignorisanje svega ostalog sto nije caption ili image
            'caption'=>'required',
            'image'=>['required','image']
        ]);
         auth()->user()->posts()->create($data);
    }
}
