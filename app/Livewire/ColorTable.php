<?php

namespace App\Livewire;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

class ColorTable extends Component
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
        $colors = Color::query()
                        ->when($this->search, fn($query) => $query->where("name", "like", "%{$this->search}%"))
                        ->orderBy($this->sortField, $this->sortDirection)
                        ->paginate($this->perPage);

        return view('livewire.color-table', compact("colors"));
    }
}
