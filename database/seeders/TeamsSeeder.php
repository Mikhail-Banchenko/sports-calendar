<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Sport;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //getting sport types from DB
        $football = Sport::where('name', 'Football')->first();
        $basketball = Sport::where('name', 'Basketball')->first();

        //adding teams (first 3 are football teams and last 3 are basketball teams) to database
        Team::insert([
            ['name' => 'Real Madrid', '_sport_id' => $football->id],
            ['name' => 'Barcelona',   '_sport_id' => $football->id],
            ['name' => 'Liverpool',   '_sport_id' => $football->id],

            ['name' => 'Lakers',      '_sport_id' => $basketball->id],
            ['name' => 'Bulls',       '_sport_id' => $basketball->id],
            ['name' => 'Celtics',     '_sport_id' => $basketball->id],
        ]);
    }
}
