<?php

namespace App\Livewire;

use Livewire\Component;

class MultiSelect extends Component
{
    public $options = [];
    public $selected = [];
    public $label = '';

    public function render()
    {
        return view('livewire.multi-select');
    }
    
}
