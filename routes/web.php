<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::resource('login', UserController::class)->names('user')->parameters(['login' => 'user']);


Route::get('usuario', [TaskController::class, 'userAuth'])->name('userAuth');
Route::get('usuario/{id}/tasks', [TaskController::class, 'home'])->name('home');
