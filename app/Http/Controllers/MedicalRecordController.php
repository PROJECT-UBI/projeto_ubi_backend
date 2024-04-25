<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Http\Response;

class MedicalRecordController extends Controller
{
    public function store(Request $request)
    {
        
        try {
            $request->validate([
                'name' => 'required|string|max:100',
                'birth' => 'required|date',
                'height' => 'required|numeric',
                'weight' => 'required|numeric',
                'blood_type' => 'nullable|string|max:100',
                'allergies' => 'nullable|string|max:100', 
                'medications' => 'nullable|string|max:100',
                'diseases' => 'nullable|string|max:100',
                'surgeries' => 'nullable|string|max:100',
                'observations' => 'nullable|string',
            ]);
    
            $medicalRecord = new MedicalRecord;
            $medicalRecord->name = $request->name;
            $medicalRecord->birth = $request->birth;
            $medicalRecord->height = $request->height;
            $medicalRecord->weight = $request->weight;
            $medicalRecord->blood_type = $request->blood_type;
            $medicalRecord->allergies = $request->allergies;
            $medicalRecord->medications = $request->medications;
            $medicalRecord->diseases = $request->diseases;
            $medicalRecord->surgeries = $request->surgeries;
            $medicalRecord->observations = $request->observations;
            $medicalRecord->save();

            return response()->json(
                ['message' => 'Medical Recorder created successfully'],
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Medical Recorder creation failed'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
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
    public function show(Request $request, $id)
    {
        
        try {
            $medicalRecord = MedicalRecord::find($id);
            return response()->json(
                ['message' => 'Medical Record found'],
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Medical Record not found'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}