<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MedicalRecordStoreRequest;
use App\Http\Services\MedicalRecordService;
use Symfony\Component\HttpFoundation\Response;

class MedicalRecordController extends Controller
{
    public function show(Request $request, $id)
    {
        $medicalRecord = MedicalRecord::find($id);

        if (!$medicalRecord) {
            return response()->json(['message' => 
            'Ficha Médica não encontrada'], 404);
        }

        return response()->json($medicalRecord);
    }

    public function __construct(private MedicalRecordService $medicalRecordService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicalRecordStoreRequest $request)
    {
        try {
            $this->medicalRecordService->store($request->validated());
            return response()->json(
                ['message' => 'User created successfully'],
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'User creation failed'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
