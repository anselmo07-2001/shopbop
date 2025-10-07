<?php

namespace App\Livewire\Admin\Panels\RegisteredCustomers;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class RegisteredCustomersManagementIndex extends Component
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

    public function render()
    {
        $customers = Customer::query()
                        ->paginate($this->perPage);
        return view('livewire.admin.panels.registered-customers.registered-customers-management-index', 
                    compact("customers"));
    }
}
