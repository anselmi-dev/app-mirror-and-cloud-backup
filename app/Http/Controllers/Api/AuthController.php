<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\License;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Get the authenticated User
     *
     * @param  Request $request
     * @return response
     */
    public function user(Request $request)
    {
        $user = User::with('user_license', 'user_license.license', 'user_license.directories')->find($request->user()->id);

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->plainTextToken;

        return response()->json([
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    /**
     * Login user and create token
     *
     * @param  Request $request
     * @return response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->plainTextToken;

        return response()->json([
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => User::with('user_license', 'user_license.license', 'user_license.directories')->find($request->user()->id)
        ]);
    }

    /**
     * Create user
     *
     * @param  Request $request
     * @return response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            'license' => 'required|string',
            // 'password_confirmation' => 'required|same:password'
        ]);

        $license = License::find($request->license);

        if (!$license)
            return response()->json(['message' => 'La Licencia es incorrecta'], 500);

        $user = new User([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user->save()) {
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            $user->assignRole('client');

            return response()->json([
                'message' => 'Successfully created user!',
                'accessToken' => $token,
                'user' => User::with('user_license', 'user_license.license', 'user_license.directories')->find($request->user()->id)
            ], 201);
        } else {
            return response()->json(['message' => 'Provide proper details']);
        }
    }

    /**
     * Get the authenticated User
     *
     * @param  Request $request
     * @return response
     */
    public function forgotPassword (Request $request)
    {
        $user = User::with('user_license', 'user_license.license', 'user_license.directories')->find($request->user()->id);

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->plainTextToken;

        return response()->json([
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param  Request $request
     * @return response
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
