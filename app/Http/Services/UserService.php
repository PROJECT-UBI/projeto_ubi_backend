<?php

namespace App\Http\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;

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

        $user = $this->userRepository->create($request->toArray());
        event(new Registered($user));

        return $user;
    }
}
