<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductManagementTable extends Component
{
    public function render()
    {
        $products = Product::all();

        return view('livewire.product-management-table', compact("products"));
    }
}
