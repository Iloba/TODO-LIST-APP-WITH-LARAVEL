@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto pt-5">
                <form method="post" action="/todos/create">
                    <h1 class="text-center">Create a Todo</h1> <br>
                    @include('layouts.error');
                    @csrf
                    <input name="title" type="text" placeholder="Enter Todo" class="form-control"> <br>
                    <input type="submit" class="btn btn-info" value="Create Todo">
                </form>
            </div>
        </div>
    </div>
@endsection