<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductManagementTable extends Component
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
        $products = Product::query()
                      ->leftJoin("end_categories", "end_categories.id", "=", "products.end_category_id")
                      ->leftJoin("mid_categories", "mid_categories.id", "=", "end_categories.mid_category_id")
                      ->leftJoin("top_categories", "top_categories.id", "=", "mid_categories.top_category_id")
                      ->select("products.*")  
                      ->when($this->search, fn($query) => 
                          $query->where("products.name", "like", "%{$this->search}%"))
                      ->when($this->sortField === "category", fn ($query) => 
                          $query->orderBy("top_categories.name", $this->sortDirection))
                      ->when($this->sortField !== "category", fn($query) =>
                           $query->orderBy("products.".$this->sortField, $this->sortDirection))
                      ->paginate($this->perPage);

        return view('livewire.product-management-table', compact("products"));
    }
}
