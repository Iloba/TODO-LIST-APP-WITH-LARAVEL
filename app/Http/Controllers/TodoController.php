<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import Todo Model
use App\Models\Todo;

class TodoController extends Controller
{
    //Route Controller for Todos

    //Show all Todos
    public function index(){
        return view('todos.index');
    }

    public function create(){
        return view('todos.create');
    }

    public function edit(){
        return view('todos.edit');
    }


    //Store Todos
    public function store(Request $request){
        
        //Validate Form request
        $request->validate([
            'title' => 'required|max:255'
        ]);

        //Store Todo
        Todo::create($request->all());

        return redirect()->back()->with('status', 'Todo Creation Successful');
    }
}
