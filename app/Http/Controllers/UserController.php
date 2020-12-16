<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    
    public function create()
    {
        return view('users.create');
    }

   
    public function store(UserRequest $request)
    {
        User::create($request->all());

        return redirect()->route('users.index');
    }
}
