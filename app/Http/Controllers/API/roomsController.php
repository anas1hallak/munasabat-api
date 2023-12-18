<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\rooms;
use App\Models\halls;
use App\Models\day;

use Illuminate\Http\Request;


class roomsController extends Controller
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
    public function store(Request $request, string $id)
    {

        $hall = halls::findOrFail($id);

        $room = new rooms;
        $room->name = $request->input('hallName');
        $room->numOfSeats = $request->input('seatCount');

        $hall->room()->save($room);


        foreach ($request->openingHours as $days=>$hours) {
            
            foreach($hours as $hour){

            $day = new day;

            $day->day = $days;
            $day->open_time = $hour['openingTime'];
            $day->close_time = $hour['closingTime'];

            $room->days()->save($day);
        }
    }

        return response()->json([

            'status' => 200,
            'message' => 'room created successfully',


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hall=halls::findOrFail($id);
        $room=$hall->room()->with('days')->get();;
    

        return response()->json([

            'status' => 200,
            'room' => $room,


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
        $room = rooms::findOrFail($id);

        $room->name = $request->input('name');
        $room->numOfSeats = $request->input('numOfSeats');

        $room->update();

        foreach ($request->days as $days=>$hours) {
            foreach($hours as $hour){

            $day =$room->days()->findOrFail($hours['id']);

            $day->day = $hours['day'];
            $day->open_time = $hours['open_time'];
            $day->close_time = $hours['close_time'];

            $day->update();
        }
    }
        return response()->json([

            'status' => 200,
            'message' => 'room updated successfully'


        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = rooms::findOrFail($id);
        $room->days()->delete();
        $room->delete();
        return response()->json([

            'status' => 200,
            'message' => 'room deleted successfully'


        ]);
    }
}
