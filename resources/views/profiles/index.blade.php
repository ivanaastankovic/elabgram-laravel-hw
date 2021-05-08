@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5" style="margin-right: 25px;">
            <img src="{{$user->profile->profileImage()}}" alt="" class="rounded-circle w-100">
        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline ">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{$user -> username}}</div>
                    @if($user->id!=auth()->user()->id)
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button> <!--Follow komponenta-->
                    @endif
                </div>
                @can('update', $user->profile)
                <a href="/p/create">Add new post</a>
                @endcan
            </div>

            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div style="display: flex;">
                <div class="p-3"><strong> {{$user->posts->count()}} </strong>posts</div>
                <div class="p-3"><strong> {{$user->profile->followers->count()}} </strong>followers</div>
                <div class="p-3"><strong> {{$user->following->count()}} </strong>following</div>
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