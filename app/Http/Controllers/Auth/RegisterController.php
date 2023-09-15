<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $users = new User;
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->password = \Hash::make($request['password']);
        $users->save();
        return view('home');
    }
}
