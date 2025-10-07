<?php

namespace App\Livewire\Admin\Panels\Faq;

use App\Models\Faq;
use Livewire\Component;
use Livewire\WithPagination;

class FaqManagementIndex extends Component
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
        $faqs = Faq::query()
                        ->when($this->sortField == "id", fn($query) => 
                            $query->orderBy("id", $this->sortDirection)) 
                        ->when($this->sortField == "title", fn($query) => 
                            $query->orderBy("title", $this->sortDirection))                       
                        ->when($this->search, fn($query) =>
                            $query->where("title", "like", "%{$this->search}%"))       
                        ->paginate($this->perPage);


        return view('livewire.admin.panels.faq.faq-management-index', compact("faqs"));
    }
}
