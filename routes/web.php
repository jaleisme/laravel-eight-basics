<?php

use App\Models\PostCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return view('home', ["title" => "Home", 'active' =>
'home']);
});
Route::get('/about', function () {
    return view('about', ["title" => "About", "name" => "Jale", "email" => "jaleisme.id@gmail.com", "site" => "jaleisme.github.io", 'active' => 'about']);
});
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => PostCategory::all(),
        "active" => 'categories'

    ]);
});

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
