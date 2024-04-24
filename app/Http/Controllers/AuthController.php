<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !\Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ], Response::HTTP_UNAUTHORIZED);
        }
        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'token' => $token,
        ], Response::HTTP_CREATED);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'success',
        ], Response::HTTP_OK);
    }

    public function me()
    {
        return response()->json(auth()->user(), Response::HTTP_OK);
    }
}
