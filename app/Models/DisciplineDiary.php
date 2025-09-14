<?php

namespace App\Models;

use App\Services\TimeConverter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisciplineDiary extends Model
{

    protected $fillable = ['it_minutes','music_minutes','english_minutes',
        'reading_minutes','sport_approach','total_minutes'];


    public function getItTimeAttribute()
    {
        return TimeConverter::ConvertMinutesToHour($this->it_minutes);
    }

    public function getMusicTimeAttribute()
    {
        return TimeConverter::ConvertMinutesToHour($this->music_minutes);
    }
    public function getEnglishTimeAttribute()
    {
        return TimeConverter::ConvertMinutesToHour($this->english_minutes);
    }
    public function getReadingTimeAttribute()
    {
        return TimeConverter::ConvertMinutesToHour($this->reading_minutes);
    }
    public function getTotalTimeAttribute()
    {
        return TimeConverter::ConvertMinutesToHour($this->total_minutes);
    }

}
