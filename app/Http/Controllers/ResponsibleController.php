<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Responsible;
use Illuminate\Http\Response;

class ResponsibleController extends Controller
{
    
    public function show(Request $request, $id)
    {
        
        try {
            $responsible = Responsible::find($id);
            return response()->json(
                $responsible
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

}
