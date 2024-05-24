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
            $medicalRecord->user_id = Auth::id();
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
    
            $medicalRecord = MedicalRecord::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
            $medicalRecord->fill($request->all());
            $medicalRecord->save();

            return response()->json(
                ['message' => 'Medical Recorder updated successfully'],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Medical Recorder updated failed'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
    public function showById(Request $request, $id)
    {
        
        try {
            $medicalRecord = MedicalRecord::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
            return response()->json(
                ['medicalRecord' => $medicalRecord],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Medical Record not found'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
    
    public function show(Request $request)
    {
        try {
            $medicalRecord = MedicalRecord::where('user_id', Auth::id())->get();
            return response()->json(
                ['medicalRecord' => $medicalRecord],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Failed to retrieve medicalRecord'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}