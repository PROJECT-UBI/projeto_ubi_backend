<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsible;

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
}
