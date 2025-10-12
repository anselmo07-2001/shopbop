<?php

namespace App\Livewire\Admin\Panels\Subscribers;

use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithPagination;

class ManageSubscribersIndex extends Component
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
        $subscribers = Subscriber::query()
                            ->when($this->sortField == "id", fn($query) =>  
                                $query->orderBy("id", $this->sortDirection)
                            )
                            ->when($this->sortField == "email", fn($query) =>  
                                $query->orderBy("email", $this->sortDirection)
                            )
                            ->when($this->sortField == "is_verified", fn($query) =>  
                                $query->orderBy("is_verified", $this->sortDirection)
                            )
                            ->when($this->search, fn($query) => 
                                $query->where("email", "like", "%{$this->search}%")
                            )
                            ->paginate($this->perPage);

        return view('livewire.admin.panels.subscribers.manage-subscribers-index', compact("subscribers"));
    }
}
