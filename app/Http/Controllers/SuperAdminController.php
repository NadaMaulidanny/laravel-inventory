<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard(){
        $user = User::count();

        return view('dashboard.dashboardSuper', compact('user'));
    }

    public function manageUser(){
        $users = User::all();

        return view('managemenUser.manageUser', compact('users'));
    }

    public function addUser(){
        return view('managemenUser.addUser');
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

       return redirect()->route('managemenUser.manageUser')
                         ->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(string $id){
        $user = User::find($id);
        $parts = explode(' ', $user->name, 2);
        $first_name = $parts[0] ?? '';
        $last_name  = $parts[1] ?? '';

        return view('managemenUser.editUser', compact('user', 'first_name', 'last_name'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = [
            'name'  => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'role'  => $request->role,
        ];

        // Kalau password diisi, update & hash
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('managemenUser.manageUser')->with('success', 'User berhasil diperbarui');
    }

    public function delete(string $id){
        $user = User::find($id);

        $user->delete();

        return redirect()->route('managemenUser.manageUser')->with('success', 'User berhasil dihapus');
    }

}
