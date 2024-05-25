<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsible;
use Illuminate\Http\Response;

class ResponsibleController extends Controller
{
    public function store(Request $request)
    {
        
        try {
            $request->validate([
                'name' => 'required|string|max:100',
                'phone' => 'required|string|max:15',
                'phone2' => 'nullable|string|max:15',
                'email' => 'required|email|max:100',
            ]);
    
            $responsible = new Responsible;
            $responsible->name = $request->name;
            $responsible->phone = $request->phone;
            $responsible->phone2 = $request->phone2;
            $responsible->email = $request->email;
            $responsible->user_id = Auth::id();
            $responsible->save();

            return response()->json(
                ['message' => 'Responsible created successfully'],
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Responsible creation failed'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
    public function update(Request $request, $id)
    {
        try {
        $request->validate([
            'name' => 'string|max:100',
            'phone' => 'string|max:15',
            'phone2' => 'nullable|string|max:15',
            'email' => 'email|max:100',
        ]);

        $responsible = Responsible::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $responsible->fill($request->all());
        $responsible->save();

        return response()->json(
            ['message' => 'Responsible updated successfully'],
            Response::HTTP_OK
        );
        } catch (\Exception $e) {
        return response()->json(
            ['message' => 'Responsible updated failed'],
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
        }
    } 
    public function showById(Request $request, $id)
    {
        
        try {
            $responsible = Responsible::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
            return response()->json(
                ['responsible' => $responsible],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Responsible not found'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
    
    public function show(Request $request)
    {
        try {
            $responsible = Responsible::where('user_id', Auth::id())->get();
            return response()->json(
                ['responsible' => $responsible],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Failed to retrieve responsible'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}