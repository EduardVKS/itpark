@extends('edit.layout')

@section('title', 'Films')

@section('content')
	<div class="col-10 mx-auto">
		<h1 class="text-center">{{isset($genre)?$genre->title:'Films'}}</h1>
		<div class="my-3"><a href="{{route('films.create')}}">add new film</a></div>
		@foreach($films as $film)
			<div class="row my-3">
				<div class="col-5">{{$film->title}}</div>
				<div class="col-2 text-center">{!! $film->published_at?$film->published_at:'<a class="btn btn-sm btn-primary" href='.route("films.publish", $film).'>Publish</a>' !!}</div>
				<div class="col-2 text-center"><a href="{{route('films.show', $film)}}">show</a></div>
				<div class="col-1 text-center"><a href="{{route('films.edit', $film)}}">edit</a></div>
				<div class="col-2 text-center"><form action="{{route('films.destroy', $film)}}" method="post">@csrf @method('delete') <button class="btn btn-link py-0" type="submit">delete</button></form></div>
			</div>
		@endforeach
		<div class="my-4">
			<a class="btn btn-md btn-secondary me-3" href="{{route('films.index')}}">All Films</a>
			<a class="btn btn-md btn-secondary" href="{{route('genres.index')}}">All Genres</a>
		</div>
	</div>
@endsection