<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Player;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //getting id of football teams from DB
        $real = Team::where('name', 'Real Madrid')->first();
        $barca = Team::where('name', 'Barcelona')->first();
        $liverpool = Team::where('name', 'Liverpool')->first();

        //getting id of basketball teams from DB
        $lakers = Team::where('name', 'Lakers')->first();
        $bulls = Team::where('name', 'Bulls')->first();
        $celtics = Team::where('name', 'Celtics')->first();

        //list of players (first 3 groups are for football teams and last 3 for basketball teams) to be added to DB
        $players = [
            ['name' => 'Thibaut Courtois',      'position' => 'Goalkeeper',            '_team_id' => $real->id],
            ['name' => 'Dani Carvajal',         'position' => 'Right Back',            '_team_id' => $real->id],
            ['name' => 'Ferland Mendy',         'position' => 'Left Back',             '_team_id' => $real->id],
            ['name' => 'Antonio Rüdiger',       'position' => 'Centre Back',           '_team_id' => $real->id],
            ['name' => 'Éder Militão',          'position' => 'Centre Back',           '_team_id' => $real->id],
            ['name' => 'Aurélien Tchouaméni',   'position' => 'Defensive Midfielder',  '_team_id' => $real->id],
            ['name' => 'Federico Valverde',     'position' => 'Central Midfielder',    '_team_id' => $real->id],
            ['name' => 'Luka Modrić',           'position' => 'Central Midfielder',    '_team_id' => $real->id],
            ['name' => 'Jude Bellingham',       'position' => 'Attacking Midfielder',  '_team_id' => $real->id],
            ['name' => 'Vinícius Júnior',       'position' => 'Left Winger',           '_team_id' => $real->id],
            ['name' => 'Rodrygo Goes',          'position' => 'Right Winger',          '_team_id' => $real->id],

            ['name' => 'Marc-André ter Stegen', 'position' => 'Goalkeeper',            '_team_id' => $barca->id],
            ['name' => 'João Cancelo',          'position' => 'Right Back',            '_team_id' => $barca->id],
            ['name' => 'Alejandro Balde',       'position' => 'Left Back',             '_team_id' => $barca->id],
            ['name' => 'Ronald Araújo',         'position' => 'Centre Back',           '_team_id' => $barca->id],
            ['name' => 'Jules Koundé',          'position' => 'Centre Back',           '_team_id' => $barca->id],
            ['name' => 'Frenkie de Jong',       'position' => 'Central Midfielder',    '_team_id' => $barca->id],
            ['name' => 'Pedri González',        'position' => 'Central Midfielder',    '_team_id' => $barca->id],
            ['name' => 'Gavi Páez',             'position' => 'Attacking Midfielder',  '_team_id' => $barca->id],
            ['name' => 'İlkay Gündoğan',        'position' => 'Central Midfielder',    '_team_id' => $barca->id],
            ['name' => 'Raphinha',              'position' => 'Right Winger',          '_team_id' => $barca->id],
            ['name' => 'Robert Lewandowski',    'position' => 'Striker',               '_team_id' => $barca->id],

            ['name' => 'Alisson Becker',        'position' => 'Goalkeeper',            '_team_id' => $liverpool->id],
            ['name' => 'Jeremie Frimpong',      'position' => 'Right Back',            '_team_id' => $liverpool->id],
            ['name' => 'Virgil van Dijk',       'position' => 'Centre Back',           '_team_id' => $liverpool->id],
            ['name' => 'Ibrahima Konaté',       'position' => 'Centre Back',           '_team_id' => $liverpool->id],
            ['name' => 'Andrew Robertson',      'position' => 'Left Back',             '_team_id' => $liverpool->id],
            ['name' => 'Ryan Gravenberch',      'position' => 'Central Midfielder',    '_team_id' => $liverpool->id],
            ['name' => 'Alexis Mac Allister',   'position' => 'Central Midfielder',    '_team_id' => $liverpool->id],
            ['name' => 'Dominik Szoboszlai',    'position' => 'Attacking Midfielder',  '_team_id' => $liverpool->id],
            ['name' => 'Mohamed Salah',         'position' => 'Right Winger',          '_team_id' => $liverpool->id],
            ['name' => 'Cody Gakpo',            'position' => 'Left Winger',           '_team_id' => $liverpool->id],
            ['name' => 'Alexander Isak',        'position' => 'Striker',               '_team_id' => $liverpool->id],

            ['name' => 'Luka Dončić',           'position' => 'Point Guard',           '_team_id' => $lakers->id],
            ['name' => 'Austin Reaves',         'position' => 'Shooting Guard',        '_team_id' => $lakers->id],
            ['name' => 'LeBron James',          'position' => 'Small Forward',         '_team_id' => $lakers->id],
            ['name' => 'Rui Hachimura',         'position' => 'Power Forward',         '_team_id' => $lakers->id],
            ['name' => 'Deandre Ayton',         'position' => 'Centre',                '_team_id' => $lakers->id],

            ['name' => 'Zach LaVine',           'position' => 'Shooting Guard',        '_team_id' => $bulls->id],
            ['name' => 'Coby White',            'position' => 'Point Guard',           '_team_id' => $bulls->id],
            ['name' => 'DeMar DeRozan',         'position' => 'Small Forward',         '_team_id' => $bulls->id],
            ['name' => 'Nikola Vučević',        'position' => 'Power Forward',         '_team_id' => $bulls->id],
            ['name' => 'Jared Vanderbilt',      'position' => 'Centre',                '_team_id' => $bulls->id],

            ['name' => 'Jayson Tatum',          'position' => 'Small Forward',         '_team_id' => $celtics->id],
            ['name' => 'Jaylen Brown',          'position' => 'Shooting Guard',        '_team_id' => $celtics->id],
            ['name' => 'Marcus Smart',          'position' => 'Point Guard',           '_team_id' => $celtics->id],
            ['name' => 'Al Horford',            'position' => 'Power Forward',         '_team_id' => $celtics->id],
            ['name' => 'Robert Williams III',   'position' => 'Centre',                '_team_id' => $celtics->id],
        ];

        //creates one SQL query instead of using create() many times in a loop
        Player::insert($players);
    }
}
