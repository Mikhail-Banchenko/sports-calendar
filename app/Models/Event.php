<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'date',
        'time',
        '_sport_id',
        '_team_left_id',
        '_team_right_id',
        'country',
        'city',
        'venue',
        'description',
    ];

    public function sport() {
        return $this->belongsTo(Sport::class, '_sport_id');
    }

    public function leftTeam() {
        return $this->belongsTo(Team::class, '_team_left_id');
    }

    public function rightTeam() {
        return $this->belongsTo(Team::class, '_team_right_id');
    }
}
