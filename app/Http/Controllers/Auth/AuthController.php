<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{

    public function index(Request $request) {
        $token = PersonalAccessToken::where('token', $request->all());

        return $token;
    }

    public function register(Request $request) {
        $fields = $request->validate([
            'username'  => 'required|string|regex:/^\S*$/u|min:6|unique:users,username',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
            'usertype'  => 'required|in:super_admin,admin,human_resource,accounting'
        ]);

        $user = User::create([
            'username'  => $fields['username'],
            'email'     => $fields['email'],
            'password'  => bcrypt($fields['password']),
            'usertype'  => $fields['usertype'],
        ]);

        $token = $user->createToken('DattJapanToken')->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request){
        $fields = $request->validate([
            'username'  => 'required|string|regex:/^\S*$/u|min:6|:users,username',
            'password'  => 'required|min:6',
        ]);

        $user = User::where('username', $fields['username'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad Creds'
            ], 401);
        }

        $token = $user->createToken('DattJapanToken')->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response()->json([
            "success"   => true,
            "message"   => "Logout Success"
        ]);
    }

}
