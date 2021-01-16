<?php

namespace App\Http\Controllers\DeliveryMan\Auth;

use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Requests\LoginValidation;


class LoginController extends Controller
{

    public function __construct()
    {
        auth()->shouldUse('api_delivery_man');
    }

    public function login(LoginValidation $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            
            if(!$token = auth()->attempt($credentials)) {

                return response()->json([
                    'errors' => [
                        'email' => ['Your email and/or password may be incorrect.']
                    ]
                ], 422);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'Could not create token!'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user_id' => auth()->user()->id,
            'role' => auth()->user()->role,
            'firstname' => auth()->user()->firstname,
            'lastname' => auth()->user()->lastname,
            'email' => auth()->user()->email,
            'type' => 'delivery_man' //api_delivery_man guard 
        ]);
    }
}
