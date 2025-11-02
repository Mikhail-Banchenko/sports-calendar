<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Sport;
use App\Models\Command;

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
        $real = Command::where('name', 'Real Madrid')->first();
        $barca = Command::where('name', 'Barcelona')->first();
        $liverpool = Command::where('name', 'Liverpool')->first();

        //getting id of basketball commands from DB
        $lakers = Command::where('name', 'Lakers')->first();
        $bulls = Command::where('name', 'Bulls')->first();
        $celtics = Command::where('name', 'Celtics')->first();

        //adding 3 football events to database
        Event::create([
            'date' => '2025-11-10',
            'time' => '18:00:00',
            'sport_id' => $football->id,
            'team_left_id' => $real->id,
            'team_right_id' => $barca->id,
            'description' => 'The legendary El Clásico — Spain’s most anticipated rivalry as Real Madrid faces Barcelona in a thrilling battle for pride and dominance.',
        ]);
        Event::create([
            'date' => '2025-11-17',
            'time' => '20:30:00',
            'sport_id' => $football->id,
            'team_left_id' => $barca->id,
            'team_right_id' => $liverpool->id,
            'description' => 'Barcelona welcomes Liverpool to Camp Nou for an exciting friendly match showcasing top-tier football talent and tactical brilliance.',
        ]);
        Event::create([
            'date' => '2025-11-21',
            'time' => '19:20:00',
            'sport_id' => $football->id,
            'team_left_id' => $real->id,
            'team_right_id' => $liverpool->id,
            'description' => 'A European showdown between two football giants — Real Madrid hosts Liverpool in a clash of champions full of passion and history.',
        ]);

        //adding 3 basketball events to database
        Event::create([
            'date' => '2025-11-12',
            'time' => '19:00:00',
            'sport_id' => $basketball->id,
            'team_left_id' => $lakers->id,
            'team_right_id' => $bulls->id,
            'description' => 'A classic NBA encounter as the Los Angeles Lakers take on the Chicago Bulls — two legendary franchises fighting for glory.',
        ]);
        Event::create([
            'date' => '2025-11-19',
            'time' => '21:15:00',
            'sport_id' => $basketball->id,
            'team_left_id' => $bulls->id,
            'team_right_id' => $celtics->id,
            'description' => 'The most iconic rivalry in basketball history — Lakers vs Celtics. Expect high energy, fierce defense, and unforgettable moments.',
        ]);
        Event::create([
            'date' => '2025-11-26',
            'time' => '20:30:00',
            'sport_id' => $basketball->id,
            'team_left_id' => $lakers->id,
            'team_right_id' => $celtics->id,
            'description' => 'An East Coast battle as the Bulls face the Celtics in a matchup defined by intensity, skill, and the pursuit of victory.',
        ]);
    }
}
