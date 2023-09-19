<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function view()
    {
        $user = Admin::all();

        return view('admin.user', ['admin' => $user]);
    }
    public function delete($id)
    {
        $admin = Admin::findOrFail($id)
            ->Delete();
    
        return redirect()->route('admin.user');
    }
    public function add(Request $request)
    {
        $admin = new Admin;
        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->password = \Hash::make($request['password']);
        $admin->save();

        return redirect()->route('admin.user');
    }
}
