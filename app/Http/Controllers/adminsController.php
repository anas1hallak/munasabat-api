<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminsController extends Controller
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

        $admin = new admin;

        $admin->name = $request->input('name');
        $admin->email=$request->input('email');
        $password = Hash::make($request->input('password'));
        $admin->password=$password;
        $admin->save();


        return response()->json([

            'status' => 200,
            'message' => 'admin created successfully'


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
