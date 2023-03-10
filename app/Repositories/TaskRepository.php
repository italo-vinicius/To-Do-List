<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskRepository
{

    public function authUser($request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return User::all()->where('email', '=', $credentials['email'])->first;
        }

    }
}
