<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use Illuminate\Http\Response;

class BandController extends Controller
{
    public function store(Request $request){
        try{
            $request->validate([
                'IMEI'=>'required|string|max:15',
                'name' => 'required|string|max:100',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            $band = new Band;
            $band->IMEI = $request->IMEI;
            $band->name = $request->name;
            $band->latitude = $request->latitude;
            $band->longitude = $request->longitude;
            $band->save();

            return response()->json(
                ['message' => 'Band created successfully'],
                Response::HTTP_CREATED
            );
        }catch (\Exception $e) {
            return response()->json(
                ['message' => 'Band creation failed'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
    public function update(Request $request, $id)
    {
        
        try {
            $request->validate([
                'IMEI'=>'string|max:15',
                'name' => 'string|max:100',
                'latitude' => 'numeric',
                'longitude' => 'numeric',
            ]);
    
            $band = Band::find($id);
            $band->fill($request->all());
            $band->save();

            return response()->json(
                ['message' => 'Band updated successfully'],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Band updated failed'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    public function showById(Request $request,$id)
    {
        
        try {
            $band = Band::find($id);
            return response()->json(
                ['message' => 'Band found'],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Band not found'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
    
    public function show(Request $request)
    {
        try {
            $bands = Band::all();
            return response()->json(
                ['bands' => $bands],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Failed to retrieve bands'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
