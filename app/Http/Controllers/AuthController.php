<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\halls;
use App\Models\admin;
use App\Models\events;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['dashboardLogin', 'register']]);
    }




    public function dashboardLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        $credentials = $request->only('email', 'password');




        $managerToken = auth()->guard('halls')->attempt($credentials);
        $adminToken = auth()->guard('admins')->attempt($credentials);


        if ($managerToken) {

            $hall = auth()->guard('halls')->user();
            
            $thisHall=halls::findOrFail($hall->id);
            $events=$thisHall->events();

            $refreshToken = auth('halls')->refresh();

            return response()->json([
                'status' => 'success',
                'role' => 'manager',
                'hall' => $hall,
                'events'=>$events,
                'authorisation' => [
                    'accessToken' => $managerToken,
                    'refreshToken' => $refreshToken,
                    'type' => 'bearer',
                ]
            ]);
        } elseif ($adminToken) {

            $admin = auth()->guard('admins')->user();
            $refreshToken = auth('admins')->refresh();

            return response()->json([
                'status' => 'success',
                'role' => 'dashboard',
                'hall' => $admin,
                'authorisation' => [
                    'token' => $adminToken,
                    'refreshToken' => $refreshToken,
                    'type' => 'bearer',
                ]
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }
    }


    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }
}
