<?php

namespace App\Repositories;

use App\Models\MedicalRecord;
use App\Repositories\Contracts\MedicalRecordRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class MedicalRecordRepository extends AbstractEloquentRepository implements MedicalRecordRepositoryInterface
{
    public function resolveModel(): Model
    {
        return app(Responsible::class);
    }
}