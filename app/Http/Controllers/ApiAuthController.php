<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;

        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6',
        ]);

        if (!Auth::attempt($attr)) {
            return response([
                'messages' => 'Credentials not match',
            ], 400);
        }

        return response([
            'messages' => 'Success',
            'token' => auth()->user()->createToken('API Token')->plainTextToken,
            'user' => auth()->user(),
        ], 200);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Tokens Revoked',
        ], 200);
    }

    public function showPosts()
    {
        return response([
            "data" => Post::select('title', 'body')->paginate(5),
        ]);
    }
}
