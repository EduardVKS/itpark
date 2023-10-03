@extends('edit.layout')

@section('title', 'Genres')

@section('content')
	<div class="col-10 mx-auto">
		<h1 class="text-center">Genres</h1> 
		<div class="my-3"><a href="{{route('genres.create')}}">add new genre</a></div>
		@foreach($genres as $genre)
			<div class="row">
				<div class="col-6">{{$genre->title}}</div>
				<div class="col-2 text-center"><a href="{{route('genres.show', $genre)}}">show</a></div>
				<div class="col-2 text-center"><a href="{{route('genres.edit', $genre)}}">edit</a></div>
				<div class="col-2 text-center"><form action="{{route('genres.destroy', $genre)}}" method="post">@csrf @method('delete') <button class="btn btn-link py-0" type="submit">delete</button></form></div>
			</div>
		@endforeach
	</div>
@endsection