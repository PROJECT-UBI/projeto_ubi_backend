<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;

class MedicalRecordController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'blood_type' => 'required',
            'allergies' => 'required', 
            'medications' => 'required',
            'diseases' => 'required',
            'surgeries' => 'required',
            'observations' => 'required',
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
