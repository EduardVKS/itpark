@extends('edit.layout')

@section('title', isset($film)?'Edit Film':'Create Film')

@section('content')
	<div class="col-10 mx-auto">
		<h1 class="text-center">{{isset($film)?'Edit '.$film->title:'Creane new film'}}</h1>

		<form class="text-center mt-5" action="{{isset($film)?route('films.update', $film):route('films.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
			@csrf
			@if(isset($film))
				@method('PUT')
			@endif

			<label class="ms-3" for="film">Title: </label>
			<input type="text" id="film" name="title" value="{{ old('title', isset($film)?$film->title:null) }}" />

			<div class="col-6 mx-auto m-4 d-flex justify-content-center align-items-center flex-wrap">
				<p class="w-100 fw-bold">Chose genres for film:</p>
				@foreach($genres as $genre)
					<label class="ms-2" for="genre_{{$genre->id}}">{{$genre->title}}</label>
					<input id="genre_{{$genre->id}}" type="checkbox" name="genres[{{$genre->id}}]" {{(isset($film_genres) && in_array($genre->id, $film_genres))?'checked':null}}>
				@endforeach
			</div>
			
			@error('title')<p class="text-danger">{{$message}}</p> @enderror

			@if(isset($film))
				<div class="col-6  mx-auto m-4"><img src="{{url('storage/'.$film->poster_url)}}" class="w-75 mx-auto"></div>
			@endif

			<label class="my-4" for="picture">Add Picture</label>
            <input id="picture" name="poster_url" type="file" />
            @error('poster_url')<p class="text-danger">{{$message}}</p> @enderror

			<br>
			<a href="{{isset($film)?route('films.show', $film):route('films.index')}}" type="button" class="btn btn-secondary btn-md m-4">Back</a>
			<button type="submit" class="btn btn-primary btn-md m-4">Save</button>
		</form>
	</div>
@endsection