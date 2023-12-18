<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\halls;




class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllServices()
    {
        $services = service::with('subservice')->whereNull('parent_id')->get();

        return response()->json([

            'status' => 200,
            'services' => $services,


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
    public function store(Request $request, string $id)
    {
        $hall=halls::findOrFail($id);


        foreach ($request->services as $serv) {

        $service=new service;

        $service->service=$serv['subServiceName'];
        $service->parent_id=$serv['id'];

        $hall->services()->save($service);

        }

        return response()->json([

            'status' => 200,
            'message' => 'service created successfully'
        ]);




    }

    /**
     * Display the specified resource.
     */
    public function hallServices(string $id)
    {

       

        $hallServices = service::with('parent')->where('halls_id',$id)->get();

        return response()->json([

            'status' => 200,
            'hallServices'=>$hallServices

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
        foreach ($request->services as $serv) {

            $service=service::findOrFail($serv['id']);
    
            $service->service=$serv['subServiceName'];
    
            $service->update();
    
            }
    
            return response()->json([
    
                'status' => 200,
                'message' => 'service updated successfully'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hallService = service::findOrFail($id);
        
        $hallService->delete();

        return response()->json([

            'status' => 200,
            'message' => 'service deleted successfully'


        ]);
    }
}
