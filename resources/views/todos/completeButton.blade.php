@if ($todo->completed)
    <a class="btn btn-success" 
    
    onclick="event.preventDefault();
    document.getElementById('form-incomplete-{{$todo->id}}').submit();" 
    class="btn btn-dark" 
    href="">
    <i class="fas fa-check"></i></a>
    
    <form style="display: none;" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('todo.incomplete', $todo-> id)}}">
        @csrf
        @method('delete')
    </form>

    @else

    <a 
        onclick="event.preventDefault();
        document.getElementById('form-complete-{{$todo->id}}').submit();" 
        class="btn btn-dark" 
        href="">
        <i class="fas fa-check"></i>
    </a>
    <form style="display: none;" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('todo.complete', $todo-> id)}}">
        @csrf
        @method('put')
    </form>
@endif