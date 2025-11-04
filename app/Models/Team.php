<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function sport() {
        return $this->belongsTo(Sport::class, '_sport_id');
    }
}