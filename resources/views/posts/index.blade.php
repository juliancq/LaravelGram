@extends('layouts.app')

@section('content')

@foreach($feed as $post)
<div class="container pt-5">
	<div class="row pt-3">	
		<div class="col-6 offset-3">
			<center><img src="/storage/{{$post->image}}" class="w-100"></center>
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-6 pl-5 offset-2">
			
			<div class="row d-flex">
				<div>
					<img src="{{$post->user->profile->profileImage()}}" class="rounded-circle mr-3" style="max-width: 45px">
				</div>
				<div>
					<h5><a class="text-light" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></h5>	
				</div>
				<div class="ms-auto">
					<p>
						{{$post->caption}}
					</p>
				</div>	
			</div>
			<hr>
			
		</div>			
	</div>
</div>
@endforeach

@endsection
