<?php

namespace App\Livewire;

use App\Models\Country;
use App\Models\ShippingCost;
use Livewire\Component;
use Livewire\WithPagination;

class ShippingCostTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = "";
    public $sortField = "id";
    public $sortDirection = "desc";

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
        $countries_shipping_cost = ShippingCost::query()
                                        ->with('country')
                                        ->when($this->search, fn($query) =>
                                            $query->whereHas('country', fn($q) =>
                                                $q->where('country_name', 'like', "%{$this->search}%")
                                            )
                                        )
                                        ->when($this->sortField === "country_name", fn($query) => 
                                            $query->orderBy(
                                                Country::select("country_name")
                                                    ->whereColumn("countries.id", "shipping_costs.country_id"),
                                                $this->sortDirection
                                            ),
                                            fn($query) => $query->orderBy($this->sortField, $this->sortDirection)
                                        )
                                        ->paginate($this->perPage);
                                        
        return view('livewire.shipping-cost-table', compact("countries_shipping_cost"));
    }
}
