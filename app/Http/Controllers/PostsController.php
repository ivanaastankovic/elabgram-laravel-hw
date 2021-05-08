<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;

class PostsController extends Controller
{
    public function __construct() // for required authorisation; svaka ruta koju korisnik zatrazi iz ovog kontrolera ce zahtevati autorizaciju
    {
        $this->middleware('auth');
    }

    public function index()
    { //za prikaz home page-a, tj. svih postova ljudi koje pratimo
        $users = auth()->user()->following()->pluck('profiles.user_id'); //uzmi id usera iz tabele profiles, to su svi profili koje ulogovani korisnik prati
        $posts = Post::whereIn('user_id', $users)->latest()->get();
        return view('posts.index', compact('posts'));
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

    public function search(Request $request)
    {
        $search = $request->get('search');
    }
}
