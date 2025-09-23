<?php

namespace App\Livewire;

use App\Models\TopCategory;
use Livewire\Component;
use Livewire\WithPagination;

class TopLevelCategoryTable extends Component
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
        $top_level_categories = TopCategory::query()
                                 ->when($this->search, fn($query) => $query->where("name", "like", "%{$this->search}%"))
                                 ->orderBy($this->sortField, $this->sortDirection)
                                 ->paginate($this->perPage);

        return view('livewire.top-level-category-table', compact("top_level_categories"));
    }
}
