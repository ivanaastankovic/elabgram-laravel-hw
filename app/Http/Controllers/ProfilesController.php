<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        //$user = \App\User::findOrFail($user); // finds a User with ID,otherwise show 404
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        return view('profiles.index', compact('user', 'follows'));
    }
    public function edit(User $user) //editovanje posta
    {
        //$user = \App\User::findOrFail($user);
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user')); //putem compact() saljemo id user-a
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title',
            'description',
            'url' => 'url',
            'image' => ''
        ]);

        //$user->profile->update($data);
        
        if (request('image')) {  //ako korisnik promeni profilnu sliku, tj. u request-u se nalazi i slika
            
            $imagePath = request('image')->store('profile', 'public'); // vraca path do fajla (slike)
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image'=> $imagePath]; 
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [] // ukoliko je korisnik promenio sliku, uzima imageArray, ako nije saljem prazan niz, da ne bi doslo do izmene; ovaj imageArray ce override-ovati $data
        ));
        return redirect("/profile/{$user->id}");
    }
}
