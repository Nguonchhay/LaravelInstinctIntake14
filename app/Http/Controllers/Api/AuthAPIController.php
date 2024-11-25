<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthAPIController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|min:10',
            'password' => 'required|min:8'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Missing required fields'
            ]);
        }
        
        $queryUser = User::where('email', $request->get('email'))->first();
        if (empty($queryUser)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ]);
        }

        if (!Hash::check($request->get('password'), $queryUser->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ]);
        }

        $token = $queryUser->createToken($queryUser->email); 
        return response()->json(['token' => $token->plainTextToken]);
    }
}
