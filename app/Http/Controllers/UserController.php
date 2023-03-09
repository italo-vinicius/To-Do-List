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
        //Metodo Post para criação de usuário

        $this->validate($request, []);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index');
    }

}
