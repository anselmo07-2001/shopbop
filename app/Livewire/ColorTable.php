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
        $colors = Color::orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.color-table', compact("colors"));
    }
}
