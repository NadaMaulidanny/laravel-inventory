<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard(){
        $user = User::count();

        return view('superadmin.dashboard', compact('user'));
    }

    public function manageUser(){
        return view('superadmin.manageUser');
    }
}
