<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Auth;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'title' => 'required',
                'body' => 'required'
            ]
        );
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/');
    }
    public function viewLogin(){
        return view('login');
    }


    public function viewRegister(){
        return view('register');
    }


    public function editPost(Post $post, Request $request){
        $incomingFields = $request->validate([
            'title'=> 'required',
            'body'=> 'required'
        ]);

        $post->update($incomingFields);
        return redirect('/');
    }

    public function viewEditPost(Post $post){
        return view('edit-post', ['post' => $post]);
    }
}

