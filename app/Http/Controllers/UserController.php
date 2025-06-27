<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $incomingFields = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $userInfo = User::create($incomingFields);
        auth()->login($userInfo);
        return redirect('/');
    }
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);
        if (auth()->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginname']])) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
           return back()->with(["loginerror" => "Invalid Credentials"]);
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
    public function viewLogin()
    {
        return view('login');
    }

    public function viewRegister()
    {
        return view('register');
    }
}
