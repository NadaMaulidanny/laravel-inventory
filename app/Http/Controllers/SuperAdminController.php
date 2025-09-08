<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard(){
        $user = User::count();

        return view('superadmin.dashboard', compact('user'));
    }

    public function manageUser(){
        $users = User::all();

        return view('superadmin.manageUser', compact('users'));
    }

    public function addUser(){
        return view('superadmin.addUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'role'       => 'required|in:user,admin,super',
        ]);

        User::create([
            'name'     => $request->first_name . ' ' . $request->last_name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

       return redirect()->route('superadmin.manageUser')
                         ->with('success', 'User berhasil ditambahkan!');
    }

}
