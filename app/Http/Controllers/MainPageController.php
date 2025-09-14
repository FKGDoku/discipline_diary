<?php

namespace App\Http\Controllers;

use App\Models\DisciplineDiary;
use Illuminate\Http\Request;
use App\Services\TimeConverter;

class MainPageController extends Controller
{
    public function index()
    {
        $notes = DisciplineDiary::orderBy('id','desc')->paginate(7);
        $totalWeekMinutes = $notes->sum('total_minutes');
        $convertTotalWeek = TimeConverter::ConvertMinutesToHour($totalWeekMinutes);
       // dump($notes);

        return view('main', compact('notes', 'convertTotalWeek'));

    }

    public function store(Request $request)
    {
        $note = $request->validate([
            'it_minutes' => 'required|integer|min:1',
            'music_minutes' => 'required|integer|min:1',
            'english_minutes' => 'required|integer|min:1',
            'reading_minutes' => 'required|integer|min:1',
            'sport_approach' => 'required|integer|min:1',
        ]);

        $note['total_minutes'] = $note['it_minutes'] + $note['music_minutes'] +
            $note['english_minutes'] + $note['reading_minutes'];

        DisciplineDiary::create($note);

        return redirect('/')->with('succes','Запись добавлена!');

    }

}
