@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}  <h5>Update Profile Photo</h5></div>
                
                <div class="card-body">
                   @include('layouts.error') 
                    <form action="/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                        <input type="submit" value="Upload">
                    </form>
                </div>
                <br>
                <a class="btn btn-success" href="{{route('todos.index')}}">My Todo List</a>
            </div>
        </div>
    </div>
</div>
@endsection
