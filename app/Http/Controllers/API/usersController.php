<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\usersResource;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;


class usersController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','store']]);

        
     }




    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = auth()->guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
       $refreshToken = auth('api')->refresh();
        

        return response()->json([
                'status' => 'success',
                'user' => $user,
                
                'authorisation' => [
                    'refresh_token' => $refreshToken,
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

   
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

       
       $validated= $request->validate([


            'fullName'=>'required|string|max:255',
            'phoneNumber'=>'required|string|min:10|max:14',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|max:24',
        ]);

        if(!$validated){

            return response()->json([

                'status' => 400,
                'message' => 'data enterd not valid'
    
    
            ]);

        }

        $user = new users;

        $user->fullName = $request->input('fullName');
        $user->mobile = $request->input('phoneNumber');
        $user->email = $request->input('email');

        $password = Hash::make($request->input('password'));

        $user->password =  $password;
        //$user->image = $request->input('image');

        $user->save();
        return response()->json([

            'status' => 200,
            'message' => 'user signed up successfully'


        ]);

    
    }


    public function show(string $id)
    {
        
        
        $user = users::findOrFail($id);

       
        return response()->json([

            'status' => 200,
            'user' => $user,


        ]);
    }


    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated= $request->validate([


            'fullName'=>'required|string|max:255',
            'mobile'=>'required|string|min:10|max:14',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|max:24',
        ]);

        if(!$validated){

            return response()->json([

                'status' => 400,
                'message' => 'data enterd not valid'
    
    
            ]);

        }

        $user = users::findOrFail($id);

        $user->fullName = $request->input('fullName');
        $user->mobile = $request->input('mobile');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->image = $request->input('image');

        $user->update();
        return response()->json([

            'status' => 200,
            'message' => 'user updated successfully'


        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        

        $user = users::findOrFail($id);
        $user->delete();
        return response()->json([

            'status' => 200,
            'message' => 'user deleted successfully'


        ]);
    }
}
