<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsible;

class ResponsibleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:15',
            'phone2' => 'nullable|string|max:15',
            'email' => 'required|email|max:100',
        ]);

        $responsible = new Responsible;
        $responsible->name = $request->name;
        $responsible->phone = $request->phone;
        $responsible->phone2 = $request->phone2;
        $responsible->email = $request->email;
        $responsible->save();

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:100',
            'phone' => 'string|max:15',
            'phone2' => 'nullable|string|max:15',
            'email' => 'email|max:100',
        ]);

        $responsible = Responsible::find($id);
        $responsible->fill($request->all());
        $responsible->save();
    }
}
