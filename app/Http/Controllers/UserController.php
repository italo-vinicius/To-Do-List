<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        //Renderiza a página de login

        return view('login');
    }


    public function create()
    {
        //Renderiza o formulário para criação de um novo usuário

        return view('createUser');
    }


    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->route('user.index');
    }



}
