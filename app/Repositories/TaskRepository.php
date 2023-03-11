<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskRepository
{

    public function authUser($request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return User::where('email', $credentials['email'])->first();
        }
        return null;
    }


    public function saveTask($request, $user)
    {
        $task = new Task();
        $task->user_id = $user->id;
        $task->title = $request->title;
        $task->task = $request->task;
        $task->save();
    }
}
