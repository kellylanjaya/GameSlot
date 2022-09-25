<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class genre_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['genreTitle'=>'FPS'],
            ['genreTitle'=>'Sandbox'],
            ['genreTitle'=>'Battle Royale'],
            ['genreTitle'=>'MOBA'],
            ['genreTitle'=>'Simulation']
        ]);
    }
}
