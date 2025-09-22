<?php

namespace App\Livewire;

use App\Models\ShippingCost;
use Livewire\Component;
use Livewire\WithPagination;

class ShippingCostTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = "";

    public function updatingSearch() {
        $this->resetPage();
    }

    public function updatingPerPage() {
        $this->resetPage();
    }
    

    public function render()
    {
        $countries_shipping_cost = ShippingCost::query()
                                        ->with('country')
                                        ->when($this->search, fn($query) =>
                                            $query->whereHas('country', fn($q) =>
                                                $q->where('country_name', 'like', "%{$this->search}%")
                                            )
                                        )->paginate($this->perPage);
                                        
        return view('livewire.shipping-cost-table', compact("countries_shipping_cost"));
    }
}
