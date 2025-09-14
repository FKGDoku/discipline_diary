<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h2>Дневник Дисциплины</h2>

<form method="post" action="{{'store'}}">
    @csrf
    <input type="number" name="it_minutes" placeholder="it_minutes">
    <input type="number" name="music_minutes" placeholder="music_minutes">
    <input type="number" name="english_minutes" placeholder="english_minutes">
    <input type="number" name="reading_minutes" placeholder="reading_minutes">
    <input type="number" name="sport_approach" placeholder="sport_approach">
    <br>
    <input type="submit">
</form>

<table border="2">
    <thead>
    <tr>
        <th>id</th>
        <th>it</th>
        <th>music</th>
        <th>english</th>
        <th>reading</th>
        <th>sport (approach)</th>
        <th>total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($notes as $note)
        <tr>
            <td>{{ $note->id }}</td>
            <td>{{ $note->it_time['hours'] }}:{{ $note->it_time['minutes'] }}</td>
            <td>{{ $note->music_time['hours'] }}:{{ $note->music_time['minutes'] }}</td>
            <td>{{ $note->english_time['hours'] }}:{{ $note->english_time['minutes'] }}</td>
            <td>{{ $note->reading_time['hours'] }}:{{ $note->reading_time['minutes'] }}</td>
            <td>{{ $note->sport_approach }}</td> <!-- Для подходов просто число -->
            <td>{{ $note->total_time['hours'] }}:{{ $note->total_time['minutes'] }} и {{ $note->sport_approach }} подходов за {{$note->date}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
всего продуктивного времени за неделю {{$convertTotalWeek['hours']}}:{{$convertTotalWeek['minutes']}}
<br>
{{ $notes->links() }} <!-- Пагинация -->


</body>
</html>
