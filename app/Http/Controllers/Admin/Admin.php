<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Admin extends Controller
{
    public function showLogin()
    {
        return view('adminLogin');
    }
    public function login()
    {
        if (Auth::guard('admin')->attempt([
            'username' => \request('username'), 'password' => \request('password')
        ])){
            return redirect('admin/dashboard');
        }else{
            return 'credential not match';
        }
    }
    public function logoutAdmin()
    {
       Auth::guard('admin')->logout();
       return redirect('admin/login');
    }
}
