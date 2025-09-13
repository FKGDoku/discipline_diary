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
    public static function TotalWeek($Totals): array
    {
        $WeekTotal_hours = 0;
        $WeekTotal_minutes = 0;
        foreach ($Totals as $total) {
        $WeekTotal_hours+=$total->total_hours;
        $WeekTotal_minutes+=$total->total_minutes;
        }
        return ['WeekTotal_hours' => $WeekTotal_hours, 'WeekTotal_minutes' => $WeekTotal_minutes];
    }
}
