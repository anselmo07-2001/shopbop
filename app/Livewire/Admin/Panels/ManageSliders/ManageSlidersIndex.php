<?php

namespace App\Livewire\Admin\Panels\ManageSliders;

use App\Models\CarouselConfig;
use Livewire\Component;

class ManageSlidersIndex extends Component
{
    public function render()
    {   
        $sliders = CarouselConfig::paginate();
        return view('livewire.admin.panels.manage-sliders.manage-sliders-index', compact("sliders")); 
    }
}
