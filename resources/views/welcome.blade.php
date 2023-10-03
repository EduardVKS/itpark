@extends('layout')

@section('title', 'itPark')

@section('content')
    <div class="col-10 mx-auto d-flex justify-content-space-around">
        <div class="col-2 text-center"><a href="{{route('genres.index')}}">Edit Genres</a></div>
        <div class="col-2 text-center"><a href="{{route('films.index')}}">Edit Films</a></div>
        <div class="col-2 text-center"><a class="ajax" href="{{route('show.genres.index')}}">Show Genres</a></div>
        <div class="col-2 text-center ajax films"><a class="ajax" href="{{route('show.films.index')}}">Show Films</a></div>
    </div>
    <div class="contents col-10 mx-auto my-5"></div>
@endsection