<?php

namespace App\Http\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    /**
     * Summary of store
     * @param array $request
     * @return Model
     */
    public function store(array $request): Model
    {
        $request = collect($request);
        $request->put('password', Hash::make($request->get('password')));
        return $this->userRepository->create($request->toArray());
    }
}
