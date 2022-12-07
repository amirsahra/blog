<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Gender extends Component
{
    public $genders;
    public  $militaries;
    public $selectedGender= null;

    public function mount()
    {
        $this->genders = ['female','male'];
    }

    public function render()
    {
        if(!is_null($this->selectedGender) && $this->selectedGender == 'male'){
            $this->militaries = [__('values.end'),__('values.exempt'),__('values.doing')];
        }
        return view('livewire.gender');
    }
}
