<?php

namespace App\Http\Controllers;

use App\Models\Schedule; // Import the Schedule model
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Show the calendar page.
     */
    public function calendar()
    {
        return view('calendar');
    }

    /**
     * Fetch all events as JSON.
     */
    public function getEvents()
    {
        $schedules = Schedule::all();
        return response()->json($schedules);
    }

    /**
     * Store a new event.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
        ]);

        try {
            $event = Schedule::create($request->only('title', 'start', 'end'));
            return response()->json(['status' => 'success', 'message' => 'Event created successfully', 'event' => $event]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to create event.']);
        }
    }

    /**
     * Update an existing event.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
        ]);

        $event = Schedule::findOrFail($id);

        try {
            $event->update($request->only('start', 'end'));
            return response()->json(['status' => 'success', 'message' => 'Event updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to update event.']);
        }
    }

    /**
     * Delete an event.
     */
    public function delete($id)
    {
        $event = Schedule::findOrFail($id);

        try {
            $event->delete();
            return response()->json(['status' => 'success', 'message' => 'Event deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete event.']);
        }
    }
}
