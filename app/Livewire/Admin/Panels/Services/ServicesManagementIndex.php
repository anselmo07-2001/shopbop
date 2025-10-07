<?php

namespace App\Livewire\Admin\Panels\Services;

use App\Models\Service;
use Livewire\Component;

class ServicesManagementIndex extends Component
{
    public function render()
    {
        $services = Service::all(); 

        return view('livewire.admin.panels.services.services-management-index', compact("services"));
    }
}
