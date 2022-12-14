<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;

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
    return view('welcome');
});

//Route::get('/p', '\App\Http\Controllers\MyPlaceController@index');
Route::get('/posts', [PostController::class,'index'])->name('post.index');
Route::get('/posts/create', [PostController::class,'create']);
Route::get('/posts/update', [PostController::class,'update']);
Route::get('/posts/delete', [PostController::class,'delete']);
Route::get('/posts/first_or_create', [PostController::class,'firstOrCreate']);
Route::get('/posts/update_or_create', [PostController::class,'updateOrCreate']);

Route::get('/main', [MainController::class,'index'])->name('main.index');
Route::get('/contacts', [ContactController::class,'index'])->name('contact.index');
Route::get('/about', [AboutController::class,'index'])->name('about.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
