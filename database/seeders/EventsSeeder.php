<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Sport;
use App\Models\Team;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //getting sport types from DB
        $football = Sport::where('name', 'Football')->first();
        $basketball = Sport::where('name', 'Basketball')->first();

        //getting id of football commands from DB
        $real = Team::where('name', 'Real Madrid')->first();
        $barca = Team::where('name', 'Barcelona')->first();
        $liverpool = Team::where('name', 'Liverpool')->first();

        //getting id of basketball commands from DB
        $lakers = Team::where('name', 'Lakers')->first();
        $bulls = Team::where('name', 'Bulls')->first();
        $celtics = Team::where('name', 'Celtics')->first();

        //football (first 3) and basketball (last 3) events
        $events = [
            [
                'date' => '2025-11-10',
                'time' => '18:00:00',
                '_sport_id' => $football->id,
                '_team_left_id' => $real->id,
                '_team_right_id' => $barca->id,
                'description' => 'The legendary El Clásico — Spain’s most anticipated rivalry as Real Madrid faces Barcelona in a thrilling battle for pride and dominance.',
                'venue' => 'Santiago Bernabéu Stadium, Madrid',
            ],
            [
                'date' => '2025-11-17',
                'time' => '20:30:00',
                '_sport_id' => $football->id,
                '_team_left_id' => $barca->id,
                '_team_right_id' => $liverpool->id,
                'description' => 'Barcelona welcomes Liverpool to Camp Nou for an exciting friendly match showcasing top-tier football talent and tactical brilliance.',
                'venue' => 'Camp Nou, Barcelona',
            ],
            [
                'date' => '2025-11-21',
                'time' => '19:20:00',
                '_sport_id' => $football->id,
                '_team_left_id' => $real->id,
                '_team_right_id' => $liverpool->id,
                'description' => 'A European showdown between two football giants — Real Madrid hosts Liverpool in a clash of champions full of passion and history.',
                'venue' => 'Santiago Bernabéu Stadium, Madrid',
            ], 

            [
                'date' => '2025-11-05',
                'time' => '18:30:00',
                '_sport_id' => $basketball->id,
                '_team_left_id' => $lakers->id,
                '_team_right_id' => $bulls->id,
                'description' => 'The Los Angeles Lakers face off against the Chicago Bulls in a high-stakes NBA preseason game filled with excitement and star power.',
                'venue' => 'Staples Center, Los Angeles',
            ], 
            [
                'date' => '2025-11-15',
                'time' => '20:00:00',
                '_sport_id' => $basketball->id,
                '_team_left_id' => $bulls->id,
                '_team_right_id' => $celtics->id,
                'description' => 'The Chicago Bulls take on the Boston Celtics in a thrilling NBA preseason matchup, promising intense competition and spectacular plays.',
                'venue' => 'United Center, Chicago',
            ],
            [
                'date' => '2025-11-25',
                'time' => '19:30:00',
                '_sport_id' => $basketball->id,
                '_team_left_id' => $lakers->id,
                '_team_right_id' => $celtics->id,
                'description' => 'An epic NBA preseason clash as the Los Angeles Lakers go head-to-head with the Boston Celtics, two of the league’s most storied franchises.',
                'venue' => 'Staples Center, Los Angeles',
            ],
        ];
        
        //creates one SQL query instead of using create() many times in a loop
        Event::insert($events);
    }
}
