<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;

class MedicalRecordController extends Controller
{
    public function register(Request $request)
    {
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

    }
}
