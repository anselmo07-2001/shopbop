<?php

namespace App\Livewire;

use App\Models\MidCategory;
use App\Models\TopCategory;
use Livewire\Component;
use Livewire\WithPagination;

class MidLevelCategoryTable extends Component
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
        $mid_level_categories = MidCategory::query()
                                    ->with("topCategory")
                                    ->when($this->search, fn($query) => $query->where("name", "like", "%{$this->search}%"))
                                    ->when($this->sortField === "top_category_name", fn($query) =>
                                        $query->orderBy(
                                            TopCategory::select("name")->whereColumn("top_categories.id", "mid_categories.top_category_id"),
                                            $this->sortDirection
                                        ),
                                        fn($query) => $query->orderBy($this->sortField, $this->sortDirection)
                                    )
                                    ->paginate($this->perPage);                    

        return view('livewire.mid-level-category-table', compact("mid_level_categories"));
    }
}
