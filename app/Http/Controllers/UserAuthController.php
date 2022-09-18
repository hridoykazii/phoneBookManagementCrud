<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function loginShow()
    {
        return view('/login');
    }
    public function login()
    {
        $this->validate(\request(),[
            'username'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt([
            'username' => \request('username'), 'password' => \request('password')
        ])){
            return redirect()->route('user.contact.show');
        }else{
            return 'credential not match';
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login.show');
    }

}
