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

//Declare Middleware 

// Route::middleware('auth')->group(function(){
    Route::get('/todos', [TodoController::class, 'index'] )->name('todos.index');

    //Return form to create Todo
    Route::get('/todos/create', [TodoController::class, 'create'] )->name('todos.create');
    
    
    Route::get('/todos/{id}/edit', [TodoController::class, 'edit'] )->name('todos.edit');
    
    //Store Todo
    Route::post('/todos/create', [TodoController::class, 'store'] )->name('todos.store');
    
    //Update Route with Patch Request (Named Route)
    Route::patch('/todos/{id}/update', [TodoController::class, 'update'])->name('todo.update');
    
    
    //Completed
    Route::put('/todos/{id}/complete', [TodoController::class, 'complete'])->name('todo.complete');
    
    //Mark Todo as Incomplete
    Route::delete('/todos/{id}/incomplete', [TodoController::class, 'incomplete'])->name('todo.incomplete');
    
    
    //Delete Route
    Route::delete('/todos/{id}/delete', [TodoController::class, 'delete'])->name('todo.delete');


    //Show Todo
    Route::get('/todos/{todo}', [TodoController::class, 'show'])->name('todo.show');
// });




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//My routes
Route::post('/upload', [UploadController::class, 'uploadAvatar']);

