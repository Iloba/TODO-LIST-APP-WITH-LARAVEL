<div>
    <h2 class="text-center">Add Steps if Required</h2> <br>
    <a wire:click="increment" style="display: block; margin: auto; width: 40%;" class=" text-light btn btn-info ">
        <i class="fas fa-plus-circle"></i></a> <br>

    @foreach($steps as $step)
        <div class="py-2" wire:key="{{$loop->index}}">
            <input name="step[]" class="form-control" 
            placeholder="{{'Describe Step '.($loop->index+1)  }}" value="{{$step['name']}}"/> <span style="cursor: poinnter;" 
            wire:click="remove({{$loop->index}})" class="fas fa-times py-2"></span>  <br>

            <input type="hidden" name="step[]"  ] rows="6" 
             value="{{$step['id']}}"/> <span style="cursor: poinnter;" 
            wire:click="remove({{$loop->index}})" class="fas fa-times py-2"></span>  <br>
        </div>
    @endforeach
  
</div>
