<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (is_null($user) || Hash::check($request->password, $user->password)) {
            return $this->sendError('[Password or username is incorrect.]');
        }

        return  $user->createToken('Auth Token')->accessToken;
    }
}
