<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsible;

class ResponsibleController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'phone2' => 'required',
            'email' => 'required|email',
        ]);

        $responsible = new Responsible;
        $responsible->name = $request->name;
        $responsible->phone = $request->phone;
        $responsible->phone2 = $request->phone2;
        $responsible->email = $request->email;
        $responsible->save();

    }
}
