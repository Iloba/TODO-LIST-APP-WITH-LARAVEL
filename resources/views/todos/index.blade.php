@extends('layouts.app')
@section('content')
    <div class="container border rounded p-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div>
                    <h1 class="text-center">My Todo List</h1>
                    @include('layouts.error')
                    <a style="display: block; margin: auto; width: 40%;" class=" text-light btn btn-info " href="/todos/create"><i class="fas fa-plus-circle"></i></a>
                </div> <br>
                <ul class="" >
                    @foreach ($todos as $todo)
                        <li class="px-2 mb-2" style="display: flex; justify-content: space-between;">
                            @include('todos.completeButton')
                            @if ($todo->completed)
                                <p style="text-decoration: line-through;" class="">{{$todo->title}}</p> 

                            @else
                                <p class="">{{$todo->title}}</p> 
                            @endif
                            <div>
                                <a href="{{'/todos/'.$todo->id.'/edit'}}" class=" text-light btn btn-info ml-2">
                                    <i class="fas fa-edit"></i></a>


                                    <a onclick="event.preventDefault();
                                        if(confirm('Do you really want to Delete this Todo?')){
                                            document.getElementById('form-delete-{{$todo->id}}').submit();
                                        }";
                                          
                                        href="{{'/todos/'.$todo->id.'/delete'}}" class=" text-light btn btn-danger ml-2">
                                        <i class="fas fa-trash"></i>
                                 </a>

                                    <form style="display: none;" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.delete', $todo-> id)}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                
                            </div>
                            
                        </li>
                        <br>
                     @endforeach
                     {{$todos->links()}}
                </ul>
                   
               
            </div>
        </div>
    </div>
@endsection