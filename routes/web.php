<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/login', [UserController::class,'viewLogin'])->name('login');



Route::get('/allpost', [PostController::class,'displayAll']);
Route::get('/register', [UserController::class,'viewRegister']);

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class,'viewLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout.post');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::delete('delete/{id}', [AdminController::class, 'deleteuser'])->name('admin.deleteuser');
    Route::delete('delete/post/{id}', [AdminController::class, 'deletepost'])->name('admin.deletepost');
});
Route::get('/edit-post/{post}', [PostController::class,'viewEditPost']);

Route::put('/edit-post/{post}', [PostController::class,'editPost']);

Route::delete('/delete-post/{post}', [PostController::class,'deletePost']);
