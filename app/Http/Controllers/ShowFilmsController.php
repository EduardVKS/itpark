<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class ShowFilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::whereNotNull('published_at')->paginate(5);
        return json_encode(['title' => 'Films', 'show' => 'films', 'action' => $films]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Films  $films
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $film->list_genres = $film->genres;
        return json_encode(['title' => $film->title, 'film' => $film]);
    }

}
