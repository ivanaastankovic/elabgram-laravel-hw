<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct() // for required authorisation; svaka ruta koju korisnik zatrazi iz ovog kontrolera ce zahtevati autorizaciju
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
            'another' => '', // za ignorisanje svega ostalog sto nije caption ili image
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('uploads', 'public'); // vraca path do fajla (slike)
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post) //prikaz posta 
    {
        return view('posts.show', compact('post')); //compact povezuje i salje $post 
    }

   
}
