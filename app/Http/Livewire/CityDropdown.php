<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Province;
use Livewire\Component;

class CityDropdown extends Component
{
    public $provinces;
    public $cities;
    public $selectedProvince = NULL;

    public function mount()
    {
        $this->provinces = Province::all();
    }

    public function render()
    {

        if(!is_null($this->selectedProvince)){
            $this->cities = City::where('province_id',$this->selectedProvince)->get();
        }
        return view('livewire.city-dropdown');
    }

    public function loadCities($province_id)
    {
        if(!is_null($province_id)){
            $this->cities = City::where('province_id',$province_id)->get();
        }
    }

}
