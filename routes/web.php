<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


//Rotas de Login e Cadastro
Route::resource('login', UserController::class)->names('user')->parameters(['login' => 'user']);


//Rotas para acessar e manipular Tasks
Route::get('usuario', [TaskController::class, 'userAuth'])->name('userAuth');
Route::post('usuario/{user}/tasks/criar', [TaskController::class, 'createTask'])->name('newTask');
Route::get('usuario/{user}/tasks', [TaskController::class, 'home'])->name('home');
Route::delete('usuario/{user}/tasks/{task_id}', [TaskController::class, 'deleteTask'])->name('deleteTask');

Route::get('/users/{user:id}', function (User $user) {
    return $user->tasks()->get();
});
