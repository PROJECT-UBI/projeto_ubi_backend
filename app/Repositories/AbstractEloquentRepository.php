<?php

namespace App\Repositories;

use App\Repositories\Contracts\AbstractEloquentRepositoryInterface;

abstract class AbstractEloquentRepository implements AbstractEloquentRepositoryInterface
{
    protected $model;

    abstract public function resolveModel();
}
