<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Http\Response;

class MedicalRecordController extends Controller
{
    public function show(Request $request, $id)
    {
        
        try {
            $medicalRecord = MedicalRecord::find($id);
            return response()->json(
                $medicalRecord,
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