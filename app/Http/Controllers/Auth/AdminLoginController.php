<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function adminlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (\Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // Authentication passed...
            return redirect()->intended('admin.dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function logoutadmin(Request $request)
    {
        \Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
