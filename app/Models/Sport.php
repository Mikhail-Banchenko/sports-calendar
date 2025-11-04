<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    public function commands() {
        return $this->hasMany(Team::class);
    }

    public function events() {
        return $this->hasMany(Event::class);
    }
}
