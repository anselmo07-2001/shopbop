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
        $customers = Customer::query()
                        ->when($this->search, fn($query) =>
                            $query->where(fn($q) => 
                                $q->where("full_name", "like", "%{$this->search}%")
                                  ->orWhere("email", "like", "%{$this->search}%")
                            )
                        )
                        ->when($this->sortField == "id", fn($query) => 
                            $query->orderBy("id", $this->sortDirection)
                        )
                        ->when($this->sortField == "name", fn($query) => 
                            $query->orderBy("full_name", $this->sortDirection)
                        )
                        ->when($this->sortField == "email", fn($query) => 
                            $query->orderBy("email", $this->sortDirection)
                        )
                        ->when($this->sortField == "city", fn($query) => 
                            $query->orderBy("city", $this->sortDirection)
                        )
                        ->when($this->sortField == "state", fn($query) => 
                            $query->orderBy("state", $this->sortDirection)
                        )
                        ->when($this->sortField == "status", fn($query) => 
                            $query->orderBy("status", $this->sortDirection)
                        )
                        ->when($this->sortField == "country", fn($query) => 
                            $query->join("countries", "customers.country_id", "=", "countries.id")
                                  ->select("customers.*", "countries.country_name")
                                  ->orderBy("countries.country_name", $this->sortDirection)
                        )
                        ->paginate($this->perPage);
                        
        return view('livewire.admin.panels.registered-customers.registered-customers-management-index', 
                    compact("customers"));
    }
}
