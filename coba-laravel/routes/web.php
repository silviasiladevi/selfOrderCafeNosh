<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [

        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Silvia Siladevi",
        "email" => "silvia.spt123@gmail.com",
        "image" => "silvia.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

//halaman single post

Route::get('posts/{post}', [PostController::class, 'show']);
