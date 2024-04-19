<?php

namespace App\Http\Services;

use App\Repositories\Contracts\ResponsibleRepositoryInterface;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ResponsibleService
{
    public function __construct(private ResponsibleRepositoryInterface $responsibleRepository)
    {
    }

    /**
     * Summary of store
     * @param array $request
     * @return Model
     */
    public function store(array $request): Model
    {
        $responsible = new Responsible;
        $responsible->name = $request->name;
        $responsible->phone = $request->phone;
        $responsible->phone2 = $request->phone2;
        $responsible->email = $request->email;
        $responsible->save();
    }

    public function update(Request $request, $id)
    {
        $responsible = Responsible::find($id);
        $responsible->fill($request->all());
        $responsible->save();
    }

    public function show(Request $request, $id)
    {
        $responsible = Responsible::find($id);
        
    }
}