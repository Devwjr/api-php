<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'Usuário não encontrado'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token inválido'], 401);
        }

        return response()->json(compact('user'));
    }
}