<?php

namespace App\Livewire;

use App\Models\ShippingCost;
use Livewire\Component;
use Livewire\WithPagination;

class ShippingCostTable extends Component
{
    use WithPagination;
    

    public function render()
    {
        $countries_shipping_cost = ShippingCost::paginate(10);
        return view('livewire.shipping-cost-table', compact("countries_shipping_cost"));
    }
}
