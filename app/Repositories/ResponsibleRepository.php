<?php

namespace App\Repositories;

use App\Models\Responsible;
use App\Repositories\Contracts\ResponsibleRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ResponsibleRepository extends AbstractEloquentRepository implements ResponsibleRepositoryInterface
{
    public function resolveModel(): Model
    {
        return app(Responsible::class);
    }
}