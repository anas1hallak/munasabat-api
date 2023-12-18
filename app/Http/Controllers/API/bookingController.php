<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\users;
use App\Models\halls;
use App\Models\rooms;
use App\Models\service;
use Illuminate\Http\Request;

class bookingController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $id)
    {  
        
        $user=users::findOrFail($id);
        $hall=halls::findOrFail($request->input('hallId'));
        $room=rooms::findOrFail($request->input('roomId'));

       

        $booking = new booking;
        

        $booking->halls_id = $request->input('hallId');
        $booking->rooms_id = $request->input('roomId');
        
        $booking->user_name = $user->fullName;
        $booking->hall_name = $hall->name;
        $booking->room_name = $room->name;

        $booking->event_type = $request->input('event');
        $booking->date = $request->input('date');
        $booking->time=$request->input('time');
        $booking->status = "pending";
        
        $user->bookings()->save($booking);

        $booking->services()->sync($request->services);

        

        return response()->json([

            'status' => 200,
            'message' => 'booking created successfully'

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $booking = booking::findOrFail($id);

        $booking->status = $request->input('status');

        $booking->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = booking::findOrFail($id);
        $booking->delete();
        return response()->json([

            'status' => 200,
            'message' => 'booking deleted successfully'


        ]);
    }

    public function hallbookings(string $id)
    {

        $booking = booking::with('services')->where('halls_id', '=', $id)->get();

        return response()->json([

            'status' => 200,
            'booking' => $booking,


        ]);
    }

    public function userbookings(string $id)
    {

       // $booking = booking::where('users_id', '=', $id)->get();

        $user=users::findOrFail($id);

        $booking=$user->bookings()->with('services')->get();


        return response()->json([

            'status' => 200,
            'booking' => $booking,


        ]);
    }


    // public function booknow(Request $request,string $id)
    // {
    //     $room=rooms::findOrFail($id);
    //     $hall_id=$room->halls_id;
        
    //     $hall=halls::findOrFail($hall_id);
    //     $events=$hall->events();
    //     $days=$room->day();
    //     $hallServices = service::with('parent')->where('halls_id',$hall_id)->get();

        


    //     return response()->json([

    //         'status' => 200,
    //         'hallServices' => $hallServices,
    //         'events' => $events,
    //         'days' => $days,



    //     ]);
    // }


}
