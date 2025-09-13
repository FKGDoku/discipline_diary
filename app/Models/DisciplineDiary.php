<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisciplineDiary extends Model
{
    protected $fillable = ['it_minutes','music_minutes','english_minutes',
        'reading_minutes','sport_approach','total_minutes'];
}
