<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sport;
use App\Models\Player;

class Team extends Model
{
    public function sport() {
        return $this->belongsTo(Sport::class, '_sport_id');
    }

    public function players() {
        return $this->hasMany(Player::class, '_team_id');
    }
}