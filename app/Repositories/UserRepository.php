<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends AbstractEloquentRepository implements UserRepositoryInterface
{
    public function resolveModel(): Model
    {
        return app(User::class);
    }
}
