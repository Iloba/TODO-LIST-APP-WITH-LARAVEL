@extends('layouts.app')
@section('content')
    <div class="container border rounded p-4">
        <div class="row">
            <div class="col-md-8 mx-auto pt-5">
                <form method="post" action="/todos/create">
                    <h1 class="text-center">Create a Todo</h1> <br>
                    @include('layouts.error');
                    @csrf
                    <input name="title" type="text" placeholder="Enter Todo" class="form-control"> <br>
                    <textarea name="description" class="form-control" id="" cols="30" rows="6"
                     placeholder="Enter Description"></textarea> <br>
                     
                    @livewire('step')
            
                    <input type="submit" class="btn btn-info" value="Create Todo"> <br> <br>
                    <a style="display: block; margin: auto; width: 50%;" class=" mt-3 text-light btn btn-success  " href="/todos">See My Todos</a>
                </form>
            </div>
           
        </div>
    </div>
@endsection