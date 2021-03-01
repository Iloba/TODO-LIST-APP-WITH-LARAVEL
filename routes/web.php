<?php

use Illuminate\Support\Facades\Route;
//Import my Controller
use App\Http\Controllers\UploadController;
use App\Http\Controllers\TodoController;

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

Route::get('/todos', [TodoController::class, 'index'] );

//Return form to create Todo
Route::get('/todos/create', [TodoController::class, 'create'] );


Route::get('/todos/edit', [TodoController::class, 'edit'] );

//Store Todo
Route::post('/todos/create', [TodoController::class, 'store'] );



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//My routes
Route::post('/upload', [UploadController::class, 'uploadAvatar']);

