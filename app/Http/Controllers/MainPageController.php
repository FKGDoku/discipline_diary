<?php

namespace App\Http\Controllers;

use App\Models\DisciplineDiary;
use Illuminate\Http\Request;
use App\Services\TimeConverter;

class MainPageController extends Controller
{
    public function main()
    {
        $notes = DisciplineDiary::orderBy('id','desc')->paginate(7);
        $totalWeekMinutes = $notes->sum('total_minutes');
        $this->minutesToHours($notes);
        $convertTotalWeek = TimeConverter::ConvertMinutesToHour($totalWeekMinutes);
        //dump($totalWeekMinutes);

        return view('main', compact('notes', 'convertTotalWeek'));

    }

    public function insert(Request $request)
    {
        $note = $request->validate([
            'it_minutes' => 'required|integer|min:1',
            'music_minutes' => 'required|integer|min:1',
            'english_minutes' => 'required|integer|min:1',
            'reading_minutes' => 'required|integer|min:1',
            'sport_approach' => 'required|integer|min:1',
        ]);
        $minutesProductive = $note['it_minutes'] + $note['music_minutes'] +
            $note['english_minutes'] + $note['reading_minutes'];


        $note['total_minutes'] = $minutesProductive;
        DisciplineDiary::create($note);

        return redirect('/');

    }


    private function minutesToHours($activities)
    {
        $fields = ['it', 'music', 'english', 'reading','total'];
        foreach ($activities as &$activity) {
            foreach ($fields as $field) {
                $minKey = $field . '_minutes';
                $hourKey = $field . '_hours';

                $minutesValue = $activity->$minKey;

                if ($minutesValue >= 60) {
                    $convert = TimeConverter::ConvertMinutesToHour($minutesValue); //смотри реализацию в app/Services/TimeConverter.php
                    $activity->$minKey = $convert['minutes'];
                    $activity->$hourKey = $convert['hours'];
                }
                else{
                    $activity->$hourKey = 0;

                }


            }
        }
        unset($activity);
        return $activities;
    }
}
