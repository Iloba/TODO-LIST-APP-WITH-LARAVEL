<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Step extends Component
{

    //Know Number of Steps
    public $steps = []; 



    //Increment Function
    public function increment(){

        //Increment the steps Variable
        $this->steps[] = count($this->steps); 
    }

    //Decrement Function
    public function remove($index){
        
        //Remove Value from Array when Remove Button is Clicked
        unset($this->steps[$index]);

        $this->steps--;
    }

    public function render()
    {
        return view('livewire.step');
    }
}
