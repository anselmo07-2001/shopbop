<?php

namespace App\Livewire\Admin\Panels\OrderManagement;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class OrderManagementIndex extends Component
{
    use WithPagination;


    public $search = '';
    public $limit = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingLimit()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
        $this->resetPage();
    }


    /**
     * The core logic: Paginates Order Numbers, then fetches full data for those orders.
     */
    public function getOrdersProperty()
    {
        $orderNumbersQuery = DB::table('orders');
            
        $orderNumbersQuery->select('order_number', DB::raw("MAX(`{$this->sortField}`) as sort_key"));
        $orderNumbersQuery->groupBy('order_number');

        // Apply Search (only possible on simple fields like order_number)
        if ($this->search) {
            $searchTerm = '%' . $this->search . '%';
            $orderNumbersQuery->where('order_number', 'like', $searchTerm);
        }

        // Apply Sorting to the aggregated key
        // We sort by the aggregated column 'sort_key' we created above.
        $orderNumbersQuery->orderBy('sort_key', $this->sortDirection);
        
        // Paginate the unique Order Numbers (the "rows" of your table). 
        $orderPaginator = $orderNumbersQuery->paginate($this->limit, ['*'], 'page');
        
        // Extract the unique order numbers for the current page. This array is correctly sorted.
        $uniqueOrderNumbers = $orderPaginator->pluck('order_number')->toArray();


        // 2. Fetch ALL associated order data for the unique order numbers on this page
        // We fetch the full detail rows needed for the table display.
        $fullOrderData = Order::with(['customer', 'product', 'payments'])
            ->whereIn('order_number', $uniqueOrderNumbers)
            ->get();
            
        // 3. Group the full data in PHP
        $groupedOrders = $fullOrderData->groupBy('order_number');
        
        // 3.5. CRITICAL FIX: Manually sort the grouped collection based on the paginated order of unique order numbers.
        // This ensures the final rendered table matches the database sort order.
        $sortedGroupedOrders = collect($uniqueOrderNumbers)->mapWithKeys(function ($orderNumber) use ($groupedOrders) {
            // Map the sorted order number to its corresponding group of order items
            return [$orderNumber => $groupedOrders->get($orderNumber)];
        })->filter(); 
        
        // 4. Create a custom paginator instance that wraps the sorted grouped data
        return new \Illuminate\Pagination\LengthAwarePaginator(
            $sortedGroupedOrders, // Grouped data collection (now sorted)
            $orderPaginator->total(), // Total count of unique order numbers
            $orderPaginator->perPage(), // Limit per page
            $orderPaginator->currentPage() // Current page number (pulled from the paginator)
        );
    }

    public function render()
    {
        // Pass the custom paginator object to the view
        return view('livewire.admin.panels.order-management.order-management-index', [
            'orders' => $this->getOrdersProperty(),
        ]);
    }
}
