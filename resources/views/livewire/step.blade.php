<div>
    <h2 class="text-center">Add Steps if Required</h2> <br>
    <a wire:click="increment" style="display: block; margin: auto; width: 40%;" class=" text-light btn btn-info ">
        <i class="fas fa-plus-circle"></i></a> <br>

    @foreach($steps as $step)
        <div class="py-2" wire:key="{{$step}}">
            <input name="step[]" class="form-control" id="" cols="30" rows="6" 
            placeholder="{{'Describe Step '.($step+1)  }}"/> <span style="cursor: poinnter;" 
            wire:click="remove({{$step}})" class="fas fa-times py-2"></span>  <br>
        </div>
    @endforeach
  
  
</div>
