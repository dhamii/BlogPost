<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Container\Attributes\Auth;

class PostController extends Controller
{


        public function __construct(){
        $this->middleware('auth');
    }
    public function createPost(Request $request)
    {
        // dd($request->all());
        try{
        $incomingFields = $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]
        );}
        catch(ValidationException $e){
            return back()->with(['errorsss' => $e->getmessage()]);
        }
        // dd($request);
        // dd($incomingFields)
        if($request->hasFile('image')){
        $path = $request->file('image')->store('image', 'public');
    $incomingFields['image'] = $path;       
    }
        $incomingFields['user_id'] = auth()->id();
        // $incomingFields['image'] = $path;
        Post::create($incomingFields);
        return redirect('/');
    }





    public function editPost(Post $post, Request $request){
        $incomingFields = $request->validate([
            'title'=> 'required',
            'body'=> 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if(auth()->user()->id != $post->user_id){
            return redirect('/');
        }
        if($request->hasFile('image')){
            $path = $request->file('image')->store('image', 'public');
            $incomingFields['image'] = $path;       
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
        $posts = Post::paginate(3);
        // dd($posts);


        return view('displayAll', compact('posts'));
    }
}

