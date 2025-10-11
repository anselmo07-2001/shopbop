<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerComments extends Component
{
    use WithPagination;

    public $productId;
    protected $paginationTheme = 'bootstrap';

    public function mount($productId) {
        $this->productId = $productId;
    }

    public function render()
    {
        $product = Product::findorFail($this->productId);
        $comments = $product->ratings()
                        ->with("customer")
                        ->orderBy("created_at", "desc")
                        ->paginate(4);

        return view('livewire.customer-comments', compact("comments"));
    }
}
