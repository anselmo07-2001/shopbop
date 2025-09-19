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

    protected $paginationTheme = "bootstrap";

    public function updatingSearch()
    {
        $this->resetPage(); // Reset to first page on search
    }

    public function render()
    {
        $sizes = Size::query()
            ->when($this->search, fn($query) => $query->where('name', 'like', "%{$this->search}%"))
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);

        return view('livewire.size-table', compact('sizes'));
    }
}
