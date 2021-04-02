@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5" style="margin-right: 25px;">
            <img src="/images/elabLogo.jpg" alt="" style="height: 150px;border:3px solid #f6f6f6;border-radius: 50%">
        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user -> username}}</h1>
                <a href="#">Add new post</a>
            </div>
            <div style="display: flex;">
                <div class="p-3"><strong>114 </strong>posts</div>
                <div class="p-3"><strong>1,258 </strong>followers</div>
                <div class="p-3"><strong>1,191 </strong>following</div>
            </div>
            <div class="pt-3">
                <strong>{{$user->profile->title}}</strong>
            </div>
            <div>
                {{$user->profile->description}}
            </div>
            <div> <a href="">{{$user->profile->url}}</a></div>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-4">
            <img src="https://instagram.fbeg2-1.fna.fbcdn.net/v/t51.2885-15/e35/c91.0.364.364a/s240x240/66817405_101765837807172_910255394735206952_n.jpg?tp=1&_nc_ht=instagram.fbeg2-1.fna.fbcdn.net&_nc_cat=100&_nc_ohc=HJOoYxnESQkAX_VPf0E&ccb=7-4&oh=bce58d78c032b21f554505232a03a0b1&oe=608928B5&_nc_sid=86f79a" alt="" style="width: 320px;">
        </div>
        <div class="col-4">
            <img src="https://instagram.fbeg2-1.fna.fbcdn.net/v/t51.2885-15/e35/c188.0.703.703a/s240x240/58718081_434059474088275_5909746709361262918_n.jpg?tp=1&_nc_ht=instagram.fbeg2-1.fna.fbcdn.net&_nc_cat=107&_nc_ohc=EixkRC4Fx8kAX97_RrC&ccb=7-4&oh=e98c41deca78013d9487ce17c17f6b7e&oe=608B63B9&_nc_sid=86f79a" alt="" style="width: 320px;">
        </div>
        <div class="col-4">
            <img src="https://instagram.fbeg2-1.fna.fbcdn.net/v/t51.2885-15/e35/c0.180.1440.1440a/s320x320/89301180_418395995667899_8920852530530659088_n.jpg?tp=1&_nc_ht=instagram.fbeg2-1.fna.fbcdn.net&_nc_cat=111&_nc_ohc=U_H6YcfT-nYAX8JY8-z&ccb=7-4&oh=44f439a88fd0a8b006650cec1c524aa3&oe=608A539D&_nc_sid=86f79a" alt="" style="width: 320px;">
        </div>
    </div>
</div>
@endsection