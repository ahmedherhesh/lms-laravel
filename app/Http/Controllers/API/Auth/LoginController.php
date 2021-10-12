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
        }
        return $this->response(auth()->user(), new UserResource(auth()->user()), 'Email Or Password InCorrect');
    }
}
