<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginAdminRequest;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthController extends Controller
{
    public function login(LoginAdminRequest $request)
    {
        /** @var User $user */
        $user = User::query()->where([
            'email' => $request->input('email'),
        ])->first();

        if (!$user || !password_verify($request->input('password'), $user->password)) {
            throw new HttpException(Response::HTTP_UNPROCESSABLE_ENTITY, 'El correo o la contraseña proporcionada son incorrectos.');
        }

        $expiresAt = Carbon::now()->addHours(5);

        $token = $user->createToken('auth_token', ['*'], $expiresAt)->plainTextToken;

        return response()->json([
            'state'        => 'logged',
            'token_type'   => 'Bearer',
            'access_token' => $token,
            'expires_at'   => $expiresAt,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'state' => 'logged_out',
        ]);
    }

    public function store(StoreAdminRequest $request)
    {
        $newUser = User::query()->create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()->json($newUser);
    }
}
