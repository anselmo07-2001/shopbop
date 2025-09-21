<?php

namespace App\Livewire;

use App\Models\Size;
use Livewire\Component;
use Livewire\WithPagination;

class SizeTable extends Component
{
    use WithPagination;

    public $search = "";
    public $perPage = 10;
    public $sortField = "id";
    public $sortDirection = "desc";

    protected $paginationTheme = "bootstrap";

    public function updatingSearch()
    {
        $this->resetPage(); // Reset to first page on search
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
        $sizes = Size::query()
            ->when($this->search, fn($query) => $query->where('name', 'like', "%{$this->search}%"))
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.size-table', compact('sizes'));
    }
}
