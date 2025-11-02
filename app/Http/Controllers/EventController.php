<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        //getting all events from DB
        //using 'with()' and Eloquent relationships to avoid executing SQL queries inside a loop
        //data is sorted by date and time
        $events = Event::with(['sport', 'leftTeam', 'rightTeam'])
                       ->orderBy('date')
                       ->orderBy('time')
                       ->get();

        //pass events data to the Blade template
        return view('events.index', compact('events'));
    }
}
