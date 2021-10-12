<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\MasterAPIController;
use App\Http\Requests\API\LoginRequest;
use App\Http\Resources\API\UserResource;
use Illuminate\Support\Facades\Auth;

class LoginController extends MasterAPIController
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = auth()->user()->status == 'approved' ? auth()->user() : 'This user is panned';
            if (gettype($user) == 'string')
                return $this->response($user, $user,'',403);
        }
        return $this->response(auth()->user(), new UserResource(auth()->user()), 'Email Or Password InCorrect');
    }
}
