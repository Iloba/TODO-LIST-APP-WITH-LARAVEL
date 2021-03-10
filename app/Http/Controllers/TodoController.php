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
        $todos = Todo::orderBy('completed', 'asc')->paginate(6);

        return view('todos.index')->with(['todos' => $todos]);
    }




    //Create Function
    public function create(){
        return view('todos.create');
    }



    //Edit Function
    public function edit($id){

        //FInd Todo By ID
        $todo = Todo::find($id);


        //Return View with $todo
        return view('todos.edit')->with(['todo'=> $todo]);
    }



    //Update Function 
    public function update(Request $request, $id){
        

        //Rules
        $rules = [
            'title' => 'required|max:255'
        ];


        //Customized Messages
        $message = [
            'title.max' => 'Todo Title Should not be greater than 255 Characters',
            'title.required' => 'You Must Add a Todo TItle'
        ];
        
        //Validate
        $validator = Validator::make($request->all(), $rules, $message);

         //If Validator Fails redirect Back with Error
         if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
     
        //Update Todo
         $todo = Todo::find($id);
          $todo->title = $request->title;

          $todo->save();

        //Return redirect with Message
        return redirect(route('todos.index'))->with('status', 'Todo Update Successful');
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
        return redirect(route('todos.index'))->with('status', 'Todo Creation Successful');
        
    }


    //Mark Todo as Completed
    public function complete($id){

        $todo = Todo::find($id);

        $todo->completed = true;

        $todo->save();

        //After Changing Redirect
        return redirect(route('todos.index'))->with('status', 'Todo Marked as Complete');

    }


    //Mark Todo as Incomplete
    public function incomplete($id){
        
        $todo = Todo::find($id);

        $todo->completed = false;

        $todo->save();

        //Redirect
        return redirect(route('todos.index'))->with('status', 'Todo Marked as Incomplete');

    }


    //Delete Todo
    public function delete($id){
        
        $todo = Todo::find($id);

        $todo->delete();

        //Redirect
        return redirect(route('todos.index'))->with('status', 'Todo Deleted Successfully');
    }
}
