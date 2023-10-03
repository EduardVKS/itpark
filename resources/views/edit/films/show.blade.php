@extends('edit.layout')

@section('title', $film->title)

@section('content')
	<div class="col-10 mx-auto">
		<h1 class="text-center">{{$film->title}}</h1>
		<div class="d-flex justify-content-center flex-wrap">
			@foreach($film->genres as $genre)
				<div class="m-2"><a href="{{route('genres.show', $genre)}}">{{$genre->title}}</a></div>
			@endforeach
		</div>

		<div class="m-4"><img src="{{url('storage/'.$film->poster_url)}}" class="w-75 mx-auto"></div>

		<div>{!! $film->published_at?$film->published_at:'<a class="btn btn-sm btn-primary ms-4" href='.route("films.publish", $film).'>Publish</a>' !!}</div>

		<div>
			<a class="btn btn-md btn-secondary m-4" href="{{route('films.index')}}">All Films</a>
			<a class="btn btn-md btn-primary" href="{{route('films.edit', $film)}}">Edit</a>
		</div>
	</div>
@endsection