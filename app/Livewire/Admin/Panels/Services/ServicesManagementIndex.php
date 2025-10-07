<?php

namespace App\Livewire\Admin\Panels\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesManagementIndex extends Component
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
        $services = Service::query()
                       ->when($this->sortField == "id", fn($query) => 
                          $query->orderBy("id", $this->sortDirection)
                       )
                       ->when($this->sortField == "title", fn($query) => 
                          $query->orderBy("title", $this->sortDirection)
                       )
                       ->when($this->sortField == "content", fn($query) => 
                          $query->orderBy("content", $this->sortDirection)
                       )
                       ->when($this->search, fn($query) =>
                            $query->where(function($q) {
                                $q->where("title", "like", "%{$this->search}%")
                                ->orWhere("content", "like", "%{$this->search}%");
                            })
                       )
                       ->paginate($this->perPage); 

        return view('livewire.admin.panels.services.services-management-index', compact("services"));
    }
}
