<?php

namespace App\Livewire;

use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\TopCategory;
use Livewire\Component;
use Livewire\WithPagination;

class EndLevelCategoryTable extends Component
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
        $end_level_categories = EndCategory::query()
            ->select("end_categories.*")
            ->leftJoin("mid_categories", "mid_categories.id", "=", "end_categories.mid_category_id")
            ->leftJoin("top_categories", "top_categories.id", "=", "mid_categories.top_category_id")
            ->with("midCategory.topCategory")
            ->when($this->search, fn($query) => 
                $query->where("end_categories.name", "like", "%{$this->search}%")
            )
            ->when($this->sortField === "mid_level_category", fn($query) =>
                $query->orderBy("mid_categories.name", $this->sortDirection)
            )
            ->when($this->sortField === "top_level_category", fn($query) =>
                $query->orderBy("top_categories.name", $this->sortDirection)
            )
            ->when(!in_array($this->sortField, ["mid_level_category", "top_level_category"]), fn($query) =>
                $query->orderBy("end_categories.".$this->sortField, $this->sortDirection)
            )
            ->paginate($this->perPage);

        return view('livewire.end-level-category-table', compact("end_level_categories"));
    }
}
