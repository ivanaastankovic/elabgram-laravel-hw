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
                @can('update', $user->profile)
                <a href="/p/create">Add new post</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div style="display: flex;">
                <div class="p-3"><strong> {{$user->posts->count()}} </strong>posts</div>
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
        @foreach($user->posts as $post)

        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" alt="" style="width: 320px;"></a>
        </div>

        @endforeach
    </div>
</div>
@endsection