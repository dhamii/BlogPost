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
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);
        if (auth()->attempt(['email' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            // Log::info($incomingFields);
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
        if(auth()->check()){
            return to_route('dashboard')->with(['routeissue' => 'You cant view this route']);
        }
        return view('login');
    }

    public function viewRegister()
    {
        if(auth()->check()){

        }
        return view('register');
    }
}
