<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository  extends AbstractEloquentRepository implements UserRepositoryInterface
{
    public function resolveModel()
    {
        return app(User::class);
    }
}
