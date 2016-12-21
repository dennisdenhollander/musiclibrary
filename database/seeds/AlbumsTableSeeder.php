<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'band_id' => '1',
            'name' => 'Thriller',
            'recorded_date' => '2001-09-15',
            'release_date' => '2001-10-16',
            'number_of_tracks' => '9',
            'label' => 'Epic',
            'producer' => 'Quincy Jones',
            'genre' => 'Pop',
            'created_at' => Carbon::now(),
        ]);

        DB::table('albums')->insert([
            'band_id' => '1',
            'name' => 'Invincible',
            'recorded_date' => '1997-10-15',
            'release_date' => '2001-10-30',
            'number_of_tracks' => '16',
            'label' => 'Sony',
            'producer' => 'Michael Jackson',
            'genre' => 'Pop',
            'created_at' => Carbon::now(),
        ]);

        DB::table('albums')->insert([
            'band_id' => '2',
            'name' => 'Wide Open Spaces',
            'recorded_date' => '1997-08-01',
            'release_date' => '1998-01-27',
            'number_of_tracks' => '12',
            'label' => 'Monument',
            'producer' => 'Blake Chancey',
            'genre' => 'Country',
            'created_at' => Carbon::now(),
        ]);

        DB::table('albums')->insert([
            'band_id' => '2',
            'name' => 'Taking The Long Way',
            'recorded_date' => '2005-05-15',
            'release_date' => '2006-05-23',
            'number_of_tracks' => '14',
            'label' => 'Open Wide',
            'producer' => 'Rick Ruben',
            'genre' => 'Country',
            'created_at' => Carbon::now(),
        ]);
    }
}
