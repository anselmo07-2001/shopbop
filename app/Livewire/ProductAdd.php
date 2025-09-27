<?php

namespace App\Livewire;

use Livewire\Component;

class ProductAdd extends Component
{
    public $description = "";
    public $short_description = "";
    public $feature = "";
    public $condition = "";
    public $return_policy = "";

    public function render()
    {
        return view('livewire.product-add');
    }

    public function store() {
        dd($this->description, $this->short_description);
    }
}
