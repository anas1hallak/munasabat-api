<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\halls;
use App\Models\events;
use App\Models\rooms;
use App\Models\day;
use App\Models\service;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class hallsController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halls = halls::all();
        
        return response()->json([

            'status' => 200,
            'halls' => $halls,


        ]);
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

        $validated = $request->validate([


            'name'=>'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|max:24',
        ]);

        if(!$validated){

            return response()->json([

                'status' => 400,
                'message' => 'data enterd not valid'
    
    
            ]);

        }

        $hall = new halls;

        $hall->name = $request->input('name');
        $hall->email=$request->input('email');
        $password = Hash::make($request->input('password'));
        $hall->password=$password;
        $hall->save();


        return response()->json([

            'status' => 200,
            'message' => 'hall created successfully'


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hall = halls::with('events')->where('id',$id)->get();
        $room=rooms::with('days')->where('halls_id',$id)->get();
        $hallServices = service::with('parent')->where('halls_id',$id)->get();

        return response()->json([

            'status' => 200,
            'hall' => $hall,
            'room'=>$room,
            'hallServices'=>$hallServices,

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
        $validated = $request->validate([


           // 'name'=>'required|string|max:255',
            'mobile1'=>'required|string|min:10|max:14',
            'mobile2'=>'string|min:10|max:14',
            'mobile3'=>'string|min:10|max:14',
            'phone'=>'required|string|min:7|max:10',
            'socialEmail' => 'string|email|max:255',
            'address' => 'string|max:255',
        ]);

        if(!$validated){

            return response()->json([

                'status' => 400,
                'message' => 'data enterd not valid'
    
    
            ]);

        }
        
        $hall = halls::findOrFail($id);

       // $hall->name = $request->input('name');
        $hall->mobile1 = $request->input('mobile1');
        $hall->mobile2 = $request->input('mobile2');
        $hall->mobile3 = $request->input('mobile3');
        $hall->phone = $request->input('phone');
        $hall->social_email = $request->input('socialEmail');
        $hall->address = $request->input('address');

        $hall->update();

        $hall->events()->sync($request->events);
        
        // foreach ($request->events as $eventData) {

            
        //     $event=new events;

        //     $event->event=$eventData;
            

        //     $hall->events()->save($event);
        // }




        return response()->json([

            'status' => 200,
            'message' => 'hall updated successfully'


        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hall = halls::findOrFail($id);
        $hall->delete();

        return response()->json([

            'status' => 200,
            'message' => 'hall deleted successfully'


        ]);
    }
}
