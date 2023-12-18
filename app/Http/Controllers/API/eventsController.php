<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\events;
use Illuminate\Http\Request;

class eventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = new events;

        $event->hall_id = $request->input('halls_id');
        $event->event = $request->input('event');

        $event->save();
        return response()->json([

            'status' => 200,
            'message' => 'event created successfully'


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = events::where('halls_id', '=', $id)->get();

        return response()->json([

            'status' => 200,
            'event' => $event


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = events::findOrFail($id);

        $event->hall_id = $request->input('halls_id');
        $event->event = $request->input('event');

        $event->update();
        return response()->json([

            'status' => 200,
            'message' => 'event updated successfully'


        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = events::findOrFail($id);
        $event->delete();
        return response()->json([

            'status' => 200,
            'message' => 'event deleted successfully'


        ]);
    }
}
