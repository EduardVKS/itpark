<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\FilmRequest;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::get();
        return view('edit.films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::get();
        return view('edit.films.form', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $data = $request->all();

        $data['poster_url'] = $request->poster_url?Storage::put('films_title', $request->poster_url):'films_title/default.jpg';

        $film = Film::create($data);
        $film->genres()->attach(array_keys($data['genres']));

        return redirect()->route('films.edit', $film);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return view('edit.films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        $genres = Genre::get();
        $film_genres = $film->genres->pluck('id')->all();
        return view('edit.films.form', compact('film', 'genres', 'film_genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $request, Film $film)
    {
        if($request->poster_url) {
            if($film->poster_url != 'films_title/default.jpg') {
                Storage::delete($film->poster_url);
            }
            $film->poster_url = Storage::put('films_title', $request->poster_url);
        }

        $film->genres()->sync(array_keys($request->genres));
        $film->title = $request->title;
        $film->save();

        return redirect()->route('films.edit', $film);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        Storage::delete($film->poster_url);
        $film->genres()->detach();
        $film->delete();

        return redirect()->back();
    }


    /**
     * Publish film.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function publish(Film $film)
    {
        $film->published_at = now();
        $film->save();

        return redirect()->back();
    }
}
