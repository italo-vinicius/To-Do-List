<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function userAuth(AuthRequest $request)
    {
        //Valida usuário e redireciona para a pagina de tasks

        $this->validate($request, []);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $person = User::all()->where('email', '=', $request->email)->first;
            return redirect()->route('home', $person->id);
        } else {
            return 'Deu erro ai meu bom..dá um back ai e tenta de novo';
        }
    }


    public function home(User $user)
    {

        return view('tasks', ['user' => $user]);
    }

    public function createTask(TaskRequest $request, User $user)
    {
        $this->validate($request, []);
        $task = new Task();
        $task->user_id = $user->id;
        $task->title = $request->title;
        $task->task = $request->task;
        $task->save();
        return redirect()->route('home', $user->id);
    }
}
