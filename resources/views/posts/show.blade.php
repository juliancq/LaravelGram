@extends('layouts.app')

@section('content')

<div class="container pt-5">
	<div class="row pt-3">	
		<div class="col-6">
			<center><img src="/storage/{{$post->image}}" class="w-100"></center>
		</div>

		<div class="col-6 pl-5">
			
			<div class="row d-flex align-items-center">
				<div>
					<img src="{{$post->user->profile->profileImage()}}" class="rounded-circle mr-3" style="max-width: 45px">
				</div>
				<div>
					<h5><a class="text-light" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></h5>	
				</div>
				<div>
					<a class="btn btn-primary btn-sm ml-5" href="#">Follow</a>
				</div>
					
			</div>
			<hr>
			<div class="row">

				<span class="pr-2">
					<b><a class="text-light" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></b>
				</span>
				<p>
					{{$post->caption}}
				</p>
			</div>				
		</div>			
	</div>
</div>


@endsection
