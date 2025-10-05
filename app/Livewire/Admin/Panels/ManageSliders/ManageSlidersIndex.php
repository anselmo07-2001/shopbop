<?php

namespace App\Livewire\Admin\Panels\ManageSliders;

use App\Models\CarouselConfig;
use Livewire\Component;
use Livewire\WithPagination;

class ManageSlidersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $perPage = 10;
    public $sortField = "id";
    public $sortDirection = "desc";
    public $search = "";

    public function updatingSearch() {
        $this->resetPage();
    }

    public function updatingPerPage() {
        $this->resetPage();
    }

    public function sortBy($field) {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === "asc" ? "desc" : "asc";
        }
        else {
            $this->sortField = $field;
            $this->sortDirection = "asc";
        }
    }

    public function render()
    {   
        $sliders = CarouselConfig::query()
                    ->when($this->search, fn($query) => 
                        $query->where(function($q) {
                             $q->where('title', 'like', "%{$this->search}%")
                                ->orWhere('subtitle', 'like', "%{$this->search}%");
                        })  
                    )
                    ->when($this->sortField === "id", fn($query) => 
                        $query->orderBy("id", $this->sortDirection)
                    )
                    ->when($this->sortField === "title", fn($query) => 
                        $query->orderBy("title", $this->sortDirection)
                    )
                    ->when($this->sortField === "subtitle", fn($query) => 
                        $query->orderBy("subtitle", $this->sortDirection)
                    )
                    ->paginate($this->perPage);

                    
        return view('livewire.admin.panels.manage-sliders.manage-sliders-index', compact("sliders")); 
    }
}
