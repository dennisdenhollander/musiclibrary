<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
            'name' => 'Michael Jackson',
            'start_date' => '1971-08-01',
            'website' => 'http://michaeljackson.com',
            'still_active' => '0',
            'created_at' => Carbon::now(),
        ]);

        DB::table('bands')->insert([
            'name' => 'Dixie Chicks',
            'start_date' => '1989-08-01',
            'website' => 'http://dixiechicks.com',
            'still_active' => '1',
            'created_at' => Carbon::now(),
        ]);
    }
}

