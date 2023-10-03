<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GenreSeeder::class,
            FilmSeeder::class,
            FilmGenreSeeder::class,
        ]);

        Storage::deleteDirectory('films_title');
        $files = Storage::files('temporary');
        foreach($files as $file) {
            Storage::copy($file, str_replace("temporary", 'films_title', $file));
        }
    }
}
