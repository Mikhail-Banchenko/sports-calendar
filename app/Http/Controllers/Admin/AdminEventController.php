<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date', 
            'time' => 'date_format:H:i',
            '_sport_id' => 'required|integer',
            '_team_left_id' => 'required|integer',
            '_team_right_id' => 'required|integer',
            'venue' => 'string|max:255',
            'description' => 'string',
        ]);

        Event::create($validated);
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $validated = $request->validate([
            'date' => 'required|date', 
            'time' => 'date_format:H:i',
            '_sport_id' => 'required|integer',
            '_team_left_id' => 'required|integer',
            '_team_right_id' => 'required|integer',
            'venue' => 'string|max:255',
            'description' => 'string',
        ]);
        $event->update($validated);
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::destroy($id);
        redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
