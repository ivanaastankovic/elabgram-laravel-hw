<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfilesController extends Controller
{
    public function index(User $user)
    {
        //$user = \App\User::findOrFail($user); // finds a User with ID,otherwise show 404
        return view('profiles.index', compact('user'));
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
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);
       
        auth()->user()->profile->update($data);
        //$user->profile->update($data);
        return redirect("/profile/{$user->id}");
    }
}
