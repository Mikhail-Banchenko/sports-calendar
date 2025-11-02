<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function sport() {
        return $this->belongsTo(Sport::class);
    }

    public function leftTeam() {
        return $this->belongsTo(Command::class, 'team_left_id');
    }

    public function rightTeam() {
        return $this->belongsTo(Command::class, 'team_right_id');
    }
}
