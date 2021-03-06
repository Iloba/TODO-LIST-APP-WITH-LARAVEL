@extends('layouts.app')
@section('content')
<div class="container border rounded p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div>
                <h1 class="text-center">Update this Todo</h1>
                <h2 class="text-center">{{$todo->title}}</h2>
            </div> <br>
            <div class="mt-4 text-center">
                <form method="post" action="{{route('todo.update', $todo->id)}}">
                    @method('patch')
                    @include('layouts.error');
                    @csrf
                    <input name="title" type="text" value="{{$todo->title}}" class="form-control"> <br>
                    <textarea name="description" class="form-control" id="" cols="30" rows="6" placeholder="Enter Description">{{$todo->description}}</textarea> <br>
                    @livewire('edit-step', ['steps' => $todo->steps])
                    <input type="submit" class="btn btn-warning" value="Update Todo"> <br> <br>
                    <a style="display: block; margin: auto; width: 50%;" class=" mt-3 text-light btn btn-success  " href="/todos">See My Todos</a>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection