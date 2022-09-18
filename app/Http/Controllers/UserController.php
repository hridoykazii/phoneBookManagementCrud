<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showRegister(){
        return view('/register');
    }
    public function register(){
        $this->validate(request(),[
            'username'=>'required | min:3 | unique:users,username',
            'password' => 'required|alpha_dash'

        ]);
        User::create([
            'username'=>request('username'),
            'password'=>bcrypt(request('password'))
        ]);
        return redirect()->route('user.register')->with('createdSuccess','Created Success!!!');
    }
}
