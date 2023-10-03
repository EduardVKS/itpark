<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['title' => 'Horror', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Western', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Romance', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Action', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Thriller', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Comedy', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Drama', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Adventure', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
