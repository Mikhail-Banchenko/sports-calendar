<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Sport;
use App\Models\Team;

class EventController extends Controller
{
    public function index(Request $request)
    {
        //get all sports and teams for filter dropdowns
        $sports = \App\Models\Sport::all();
        $teams = \App\Models\Team::all();

        //check if both teams are the same then return empty result set
        if ($request->filled('team_left') && $request->filled('team_right') && $request->team_left === $request->team_right) {
            $events = collect();
            return view('events.index', [
                'events' => $events,
                'sports' => $sports,
                'teams' => $teams,
                'request' => $request,
            ]);
        }

        //build the query baseed on Event model
        $query = Event::query()->with(['sport', 'leftTeam', 'rightTeam']);

        //next conditions are adding filters based on user input. It creates one SQL query with WHERE clauses.
        //filter by sport
        if ($request->filled('sport_id')) {
            $query->where('_sport_id', $request->sport_id);
        }

        //filter by first team
        if ($request->filled('team_left')) {
            $query->where(function ($q) use ($request) {
                $q->where('_team_left_id', $request->team_left)
                ->orWhere('_team_right_id', $request->team_left);
            });
        }

        //filter by second team
        if ($request->filled('team_right')) {
            $query->where(function ($q) use ($request) {
                $q->where('_team_left_id', $request->team_right)
                ->orWhere('_team_right_id', $request->team_right);
            });
        }

        //filter by date range
        $startDate = $request->input('start_date', now()->toDateString());
        $endDate = $request->input('end_date');
        $query->whereDate('date', '>=', $startDate);
        if ($endDate) {
            $query->whereDate('date', '<=', $endDate);
        }

        //filter by location (country and city)
        if ($request->filled('country')) {
            $query->where('country', 'like', "%{$request->country}%");
        }
        if ($request->filled('city')) {
            $query->where('city', 'like', "%{$request->city}%");
        }

        //execute the query and get the results ordered by date
        $events = $query->orderBy('date')->get();

        return view('events.index', compact('events', 'sports', 'teams', 'request'));
    }

    //display details of a specific event
    public function show($id)
    {
        //search for the event by its ID otherwise return 404 error
        $event = Event::findOrFail($id);

        //pass event data to the Blade template
        return view('events.show', compact('event'));
    }
}