<?php

namespace App\Services;

class TimeConverter
{
    public static function ConvertMinutesToHour($time): array
    {
        return [
            'hours' => floor($time / 60),
            'minutes' => $time % 60];
    }

}
