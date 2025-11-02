<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Command;
use App\Models\Sport;

class CommandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //getting sport types from DB
        $football = Sport::where('name', 'Football')->first();
        $basketball = Sport::where('name', 'Basketball')->first();

        //adding 3 football commands to database
        Command::create(['name' => 'Real Madrid', 'sport_id' => $football->id]);
        Command::create(['name' => 'Barcelona', 'sport_id' => $football->id]);
        Command::create(['name' => 'Liverpool', 'sport_id' => $football->id]);

        //adding 3 basketball commands to database
        Command::create(['name' => 'Lakers', 'sport_id' => $basketball->id]);
        Command::create(['name' => 'Bulls', 'sport_id' => $basketball->id]);
        Command::create(['name' => 'Celtics', 'sport_id' => $basketball->id]);
    }
}
