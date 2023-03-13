<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function userAuth(AuthRequest $request)
    {
        $validated = $request->validated();
        if (!$validated) {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }

        try {
            $person = $this->repository->authUser($request);

            return redirect()->route('home', $person->id)->with('success', 'Login realizado com sucesso!');

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()])->withInput();
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

//TODO: verificar se posso limpar ainda mais o controller
