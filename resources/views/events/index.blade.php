<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sports Calendar</title>
</head>
<body>
    <h1>Sports Events</h1>

    @if($events->isEmpty())
        <p>No events found.</p>
    @else
        <ul>
            @foreach($events as $event)
                <li>
                    {{ $event->date }} {{ $event->time }}: 
                    {{ $event->sport->name }} — 
                    {{ $event->leftTeam->name }} vs {{ $event->rightTeam->name }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>