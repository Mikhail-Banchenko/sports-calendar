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
                'date' => '2025-10-15',
                'time' => '18:00:00',
                '_sport_id' => $football->id,
                '_team_left_id' => $real->id,
                '_team_right_id' => $barca->id,
                'description' => 'An intense showdown between two iconic clubs, with both teams eager to prove their dominance in one of football’s most storied rivalries. (this event is only for tests of filters(date in the past))',
                'country' => 'United Kingdom',
                'city' => 'London',
                'venue' => 'Wembley Stadium',
            ],
            [
                'date' => '2025-12-10',
                'time' => '18:00:00',
                '_sport_id' => $football->id,
                '_team_left_id' => $real->id,
                '_team_right_id' => $barca->id,
                'description' => 'The legendary El Clásico — Spain’s most anticipated rivalry as Real Madrid faces Barcelona in a thrilling battle for pride and dominance.',
                'country' => 'Spain',
                'city' => 'Madrid',
                'venue' => 'Santiago Bernabéu Stadium',
            ],
            [
                'date' => '2025-12-17',
                'time' => '20:30:00',
                '_sport_id' => $football->id,
                '_team_left_id' => $barca->id,
                '_team_right_id' => $liverpool->id,
                'description' => 'Barcelona welcomes Liverpool to Camp Nou for an exciting friendly match showcasing top-tier football talent and tactical brilliance.',
                'country' => 'Spain',
                'city' => 'Barcelona',
                'venue' => 'Camp Nou',
            ],
            [
                'date' => '2025-12-21',
                'time' => '19:20:00',
                '_sport_id' => $football->id,
                '_team_left_id' => $real->id,
                '_team_right_id' => $liverpool->id,
                'description' => 'A European showdown between two football giants — Real Madrid hosts Liverpool in a clash of champions full of passion and history.',
                'country' => 'Spain',
                'city' => 'Madrid',
                'venue' => 'Santiago Bernabéu Stadium',
            ], 

            [
                'date' => '2025-12-05',
                'time' => '18:30:00',
                '_sport_id' => $basketball->id,
                '_team_left_id' => $lakers->id,
                '_team_right_id' => $bulls->id,
                'description' => 'The Los Angeles Lakers face off against the Chicago Bulls in a high-stakes NBA preseason game filled with excitement and star power.',
                'country' => 'USA',
                'city' => 'Los Angeles',
                'venue' => 'Staples Center',
            ], 
            [
                'date' => '2025-12-15',
                'time' => '20:00:00',
                '_sport_id' => $basketball->id,
                '_team_left_id' => $bulls->id,
                '_team_right_id' => $celtics->id,
                'description' => 'The Chicago Bulls take on the Boston Celtics in a thrilling NBA preseason matchup, promising intense competition and spectacular plays.',
                'country' => 'USA',
                'city' => 'Chicago',
                'venue' => 'United Center',
            ],
            [
                'date' => '2025-12-25',
                'time' => '19:30:00',
                '_sport_id' => $basketball->id,
                '_team_left_id' => $lakers->id,
                '_team_right_id' => $celtics->id,
                'description' => 'An epic NBA preseason clash as the Los Angeles Lakers go head-to-head with the Boston Celtics, two of the league’s most storied franchises.',
                'country' => 'USA',
                'city' => 'Los Angeles',
                'venue' => 'Staples Center',
            ],
        ];
        
        //insert() creates one SQL query instead of using create() many times in a loop
        Event::insert($events);
    }
}
