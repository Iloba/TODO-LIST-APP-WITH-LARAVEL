@extends('layouts.app')
@section('content')
<div class="container border rounded p-4">
    <div class="row">
        <div class="col-md-8 mx-auto pt-5">
            <h1 class="text-center">{{$todo->title}}</h1>
            <div>
                <p class="text-center">
                    <h4 class="text-center"><i>Below is the Description for this Task</i></h4>
                    <p class="text-center">{{$todo->description}}</p>
                </p>
            </div> <br>
            <div>
                @if ($todo->steps->count() > 0)
                <h4 class="text-center"><i>Below are the Steps for this Task</i></h4>
                    <ul class="text-center">
                        @foreach ($todo->steps as $steps)
                            <li>{{$steps->name}}</li>
                        @endforeach
                    
                    </ul> 
                @else
                    <p>There are No Registered Steps</p>
                @endif
            </div>
          <div>
            <a class="btn btn-info" href="{{route('todos.index')}}">Back</a>
          </div>
        </div> <br>
    </div>
</div>
@endsection