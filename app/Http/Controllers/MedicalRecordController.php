<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Http\Response;

class MedicalRecordController extends Controller
{
    public function update(Request $request, $id)
    {
        
        try {
            $request->validate([
                'name' => 'string|max:100',
                'birth' => 'date',
                'height' => 'numeric',
                'weight' => 'numeric',
                'blood_type' => 'nullable|string|max:100',
                'allergies' => 'nullable|string|max:100', 
                'medications' => 'nullable|string|max:100',
                'diseases' => 'nullable|string|max:100',
                'surgeries' => 'nullable|string|max:100',
                'observations' => 'nullable|string',
            ]);
    
            $medicalRecord = MedicalRecord::find($id);
            $medicalRecord->fill($request->all());
            $medicalRecord->save();

            return response()->json(
                ['message' => 'Medical Recorder updated successfully'],
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Medical Recorder updated failed'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
