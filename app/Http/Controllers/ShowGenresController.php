<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class ShowGenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode(['title' => 'Genres', 'show' => 'genres', 'action' => Genre::get()]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        $films = $genre->films()->whereNotNull('published_at')->paginate(5);
        return json_encode(['title' => $genre->title, 'show' => 'films', 'action' => $films]);
    }

    
}
