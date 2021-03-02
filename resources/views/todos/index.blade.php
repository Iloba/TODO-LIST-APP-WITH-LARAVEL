@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div>
                    <h1 class="text-center">My Todo List</h1>
                    <a style="display: block; margin: auto; width: 40%;" class=" text-light btn btn-info " href="/todos/create">Create New Todo</a>
                </div> <br>
                <ul class="text-center" >
                    @foreach ($todos as $todo)
                        <li class="px-2" style="display: flex; justify-content: center;">
                            <p>{{$todo->title}}</p>
                            <a href="{{'/todos/'.$todo->id.'/edit'}}" class="btn btn-info btn-sm">Edit</a>
                        </li>
                     @endforeach
                </ul>
                   
               
            </div>
        </div>
    </div>
@endsection