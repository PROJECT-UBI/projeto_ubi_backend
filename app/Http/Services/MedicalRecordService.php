<?php

namespace App\Http\Services;

use App\Repositories\Contracts\MedicalRecordRepositoryInterface;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MedicalRecordService
{
    public function __construct(private MedicalRecordRepositoryInterface $MedicalRecordRepository)
    {
    }

    /**
     * Summary of store
     * @param array $request
     * @return Model
     */
    public function store(array $request): Model
    {
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

    public function update(Request $request, $id)
    {
        $medicalRecord = MedicalRecord::find($id);
        $medicalRecord->fill($request->all());
        $medicalRecord->save();
    }

    public function show(Request $request, $id)
    {
        $medicalRecord = MedicalRecord::find($id);
        
    }
}