<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    public function sport() {
        return $this->belongsTo(Sport::class);
    }
}
