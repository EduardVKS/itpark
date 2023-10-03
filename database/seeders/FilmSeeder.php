<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            ['title' => 'Film 1', 'poster_url' => 'films_title/poster-1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Film 2', 'poster_url' => 'films_title/poster-2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Film 3', 'poster_url' => 'films_title/poster-3.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Film 4', 'poster_url' => 'films_title/poster-4.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Film 5', 'poster_url' => 'films_title/poster-5.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Film 6', 'poster_url' => 'films_title/poster-6.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Film 7', 'poster_url' => 'films_title/poster-7.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Film 8', 'poster_url' => 'films_title/poster-8.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Film 9', 'poster_url' => 'films_title/poster-9.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Film 10', 'poster_url' => 'films_title/poster-10.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
