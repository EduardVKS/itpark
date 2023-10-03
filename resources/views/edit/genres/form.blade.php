@extends('edit.layout')

@section('title', isset($genre)?'Edit Genre':'Create Genre')

@section('content')
	<div class="col-10 mx-auto">
		<h1 class="text-center">{{isset($genre)?'Edit '.$genre->title:'Creane new genre'}}</h1>

		<form class="text-center mt-5" action="{{isset($genre)?route('genres.update', $genre):route('genres.store')}}" method="post" autocomplete="off">
			@csrf
			@if(isset($genre))
				@method('PUT')
			@endif

			<label class="ms-3" for="genre">Title: </label>
			<input type="text" id="genre" name="title" value="{{ old('title', isset($genre)?$genre->title:null) }}" />
			@error('title')<p class="text-danger">{{$message}}</p> @enderror

			<br>
			<a href="{{route('genres.index')}}" type="button" class="btn btn-secondary btn-md m-4">Back</a>
			<button type="submit" class="btn btn-primary btn-md m-4">Save</button>
		</form>
	</div>
@endsection