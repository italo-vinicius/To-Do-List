<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Rotas de Login e Cadastro
Route::resource('login', UserController::class)->names('user')->parameters(['login' => 'user']);


//Rotas para acessar e manipular Tasks
Route::get('usuario', [TaskController::class, 'userAuth'])->name('userAuth');
Route::post('usuario/{user}/tasks/criar', [TaskController::class, 'createTask'])->name('newTask');
Route::get('usuario/{user}/tasks', [TaskController::class, 'home'])->name('home');
