<?php

namespace App\Http\Controllers;

//Import Todo Model
use App\Models\Todo;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    //Route Controller for Todos

    //Show all Todos
    public function index(){

        //Get All Todos
        $todos = Todo::all();

        return view('todos.index')->with(['todos' => $todos]);
    }

    public function create(){
        return view('todos.create');
    }

    public function edit(){
        return view('todos.edit');
    }


    //Store Todos
    public function store(Request $request){
        
        //Validate Form request (Rules)
        $rules = [
            'title' => 'required|max:255'
        ];

        //Customized Messages
        $messages = [
            'title.max' => 'Todo Title Should not be greater than 255 Characters',
            'title.required' => 'You Must Add a Todo TItle'
        ];

       //Using the Validator Facade will help Us to Customize our error messages
       $validator = Validator::make($request->all(), $rules, $messages);

        //If Validator Fails redirect Back with Error
        if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        //Store Todo if Validation is Successful
        Todo::create($request->all());

        //Return Redirect with Success Message
        return redirect()->back()->with('status', 'Todo Creation Successful');
        
    }
}
