<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function userAuth(AuthRequest $request)
    {
        //Valida usuário e redireciona para a pagina de tasks
        try {
            $this->validate($request, []);
            $person = $this->repository->authUser($request);
            return redirect()->route('home', $person->id);
        } catch (\Exception) {
            return redirect()->back();
        }

    }


    public function home(User $user)
    {

        return view('tasks', ['user' => $user]);
    }


    public function createTask(TaskRequest $request, User $user)
    {
        $this->validate($request, []);
        $this->repository->saveTask($request, $user);
        return redirect()->route('home', $user->id);
    }

    public function deleteTask(User $user, Task $task_id)
    {
        $task_id->delete();
        return redirect()->route('home', [$user->id]);
    }
}
