<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Container\Attributes\Auth;

class AdminController extends Controller
{
    public function viewLogin()
    {
        return view('admin.login');
    }

    public function Login(Request $request){
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->guard('admin')->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        else{
            return back()->with(['loginerror' => 'Invalid Credentials']);
        }
    }

    public function dashboard(){

        if(!auth('admin')->check()){
            return to_route('admin.login');
        }
        $users = User::all();
        $posts = Post::all();
        // $id = auth()->guard('admin')->user()->id;
        return view('admin.AdminDashboard', compact('users', 'posts'));
    }

    public function deleteuser(User $user, $id){
        $user = User::find($id);
        if(!$user){
            return back();
        }
        $user->delete();
        return redirect()->route('admin.dashboard');
    }



    public function deletepost($id){
        $post = Post::find($id);
        $post->delete();
        return back()->with(['result' => 'Deleted Successfully']);
    }


    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}