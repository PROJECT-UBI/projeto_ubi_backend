<?php

namespace App\Http\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function store(array|Collection $request)
    {
        
    }
}
