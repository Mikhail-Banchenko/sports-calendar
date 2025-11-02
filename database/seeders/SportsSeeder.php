<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //adding 2 types of sport to database
        Sport::create(['name' => 'Football']);
        Sport::create(['name' => 'Basketball']);
    }
}
