<?php

declare(strict_types=1);

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\UsesJsonResponer;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use UsesJsonResponer;

    public function token(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! \Hash::check($data['password'], $user->password)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'auth' => ['Auth data not valid.'],
            ]);
        }

        $token = $user->createToken($data['device_name']);

        return $this->respondOk(['token' => $token->plainTextToken]);
    }
}
