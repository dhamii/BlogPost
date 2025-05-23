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
        if(auth()->user()->id != $post->user_id){
            return redirect('/');
        }
        $post->update($incomingFields);
        return redirect('/');
    }

    public function viewEditPost(Post $post){
        if(auth()->user()->id != $post['user_id']){
        return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }

    public function deletePost(Post $post){
        if(auth()->user()->id != $post['user_id']){
            return redirect('/');
        }

        $post->delete();
        return redirect('/');
    }
    public function displayAll(){
        $posts = Post::all();
        // dd($posts);


        return view('displayAll', ['posts'=> $posts]);
    }
}

