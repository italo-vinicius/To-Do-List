<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function userAuth(Request $request)
    {
        $this->validate($request, []);
        $person = User::all()->where('email','=', $request->email)->first;
        return redirect()->route('home', $person->id);


    }

    public function home()
    {

        return view('tasks');
    }
}
