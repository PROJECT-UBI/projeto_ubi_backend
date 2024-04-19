<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResponsibleStoreRequest;
use App\Http\Services\ResponsibleService;
use Symfony\Component\HttpFoundation\Response;

class ResponsibleController extends Controller
{
    public function __construct(private ResponsibleService $responsibleService)
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
    public function store(ResponsibleStoreRequest $request)
    {
        try {
            $this->responsibleService->store($request->validated());
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $this->responsibleService->show($request->validated());
            return response()->json(
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
        try {
            $this->responsibleService->update($request->validated());
            return response()->json(
                ['message' => 'Responsible updated successfully'],
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'Responsible update failure'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
