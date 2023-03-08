<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function userAuth(AuthRequest $request)
    {
        $this->validate($request, []);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $person = User::all()->where('email', '=', $request->email)->first;
            return redirect()->route('home', $person->id);
        } else {
            return 'Deu erro ai meu bom';


        }
    }

    public function home()
    {

        return view('tasks');
    }
}
