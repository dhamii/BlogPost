<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = [];
    if(auth()->check()){
        
        $posts = auth()->user()->posts()->latest()->get();
        return view('home', ['posts' => $posts]);
    }
    else{
        return redirect('/login');
    }
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);


Route::post('/create_post', [PostController::class, 'createPost']);


Route::get('/login', [PostController::class,'viewLogin']);




Route::get('/register', [PostController::class,'viewRegister']);


Route::get('/edit-post/{post}', [PostController::class,'viewEditPost']);

Route::put('/edit-post/{post}', [PostController::class,'editPost']);


Route::delete('/delete-post/{post}', [PostController::class,'deletePost']);