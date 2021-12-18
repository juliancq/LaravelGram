@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-9">
            
            <div class="row">    
            
                <div class="col-3 pr-3">
                        <img src="{{$user->profile->profileImage()}}" class="rounded-circle" style="height: 150px">
                </div>

                <div class="col-6">
                        <div class="p-2"><h3>{{ $user->username }}</h2></div>
                        <div class="d-flex pl-2">
                            <div class="pr-4"><strong>{{ $user->posts->count() }}</strong> posts</div>
                            <div class="pr-4"><strong>{{ $user->profile->followers->count() }}</strong> followers</div>
                            <div class="pr-4"><strong>{{ $user->following->count() }}</strong> following</div>
                        </div>
                        <div class="pl-2 pt-3"><strong>{{ $user->profile->title ?? "..."}}</strong></div>
                        <div class="pl-2">{{ $user->profile->description ?? "..." }}</div>
                        <div class="pl-2"><a href="">{{$user->profile->url ?? "..."}}</a></div>
                </div>

                
                    <div class="d-flex col-3 pt-2">
                        @can('update', $user->profile)
                            <a href="/posts/create">Add Post</a>
                            <a href="/profile/{{$user->id}}/edit" class="ml-3">Edit Profile</a>
                        @else

                                <follow-button user-id="{{$user->id}}" is-following="{{$following}}"></follow-button>
            
                        @endcan
        
                    </div>

            </div>

            <div class="row pt-4">
                @foreach($user->posts as $post)

                    <div class="col-4 mt-3">              
                        <a href="../posts/{{$post->id}}">
                            <img src="/storage/{{ $post->image }}" class="w-100">
                        </a>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
