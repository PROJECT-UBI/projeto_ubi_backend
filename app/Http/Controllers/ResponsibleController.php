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
      public function update(Request $request, $id)
    {
        
        try {
            $request->validate([
                'name' => 'string|max:100',
                'phone' => 'string|max:15',
                'phone2' => 'nullable|string|max:15',
                'email' => 'email|max:100',
            ]);
    
            $responsible = Responsible::find($id);
            $responsible->fill($request->all());
            $responsible->save();

            return response()->json(
                ['message' => 'Responsible updated successfully'],
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Responsible updated failed'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        public function show(Request $request, $id)
    {
        
        try {
            $responsible = Responsible::find($id);
            return response()->json(
                $responsible
                ['message' => 'Responsible found'],
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Responsible not found'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
}
}