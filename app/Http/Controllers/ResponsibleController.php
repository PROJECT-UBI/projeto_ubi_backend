<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsible;
use Illuminate\Http\Response;

class ResponsibleController extends Controller
{

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
    }
}
