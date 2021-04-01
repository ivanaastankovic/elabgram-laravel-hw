<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = \App\User:: findOrFail($user); // nalazi nam User-a sa ID-jem
        return view('home', ['user' => $user]);
    }
}
