<div class="container-fluid py-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0"><i class="bi bi-people me-2"></i>View Customers</h4>
    </div>

    <!-- Controls -->
    <div class="row mb-3">
        <div class="col-md-6 d-flex align-items-center">
            <label class="form-label me-2 mb-0">Show</label>
            <select wire:model.live="perPage" class="form-select form-select-sm w-auto">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <span class="ms-2">entries</span>
        </div>
        <div class="col-md-6 text-end">
            <input type="text" wire:model.live.debounce.300ms="search" 
                   class="form-control form-control-sm w-auto d-inline" placeholder="Search customer">
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">
                        <div class="d-flex align-items-center">
                            <span class="me-1">#</span>
                            <button wire:click="sortBy('id')" class="btn btn-sm btn-link p-0 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center">
                            <span class="me-1">Name</span>
                            <button wire:click="sortBy('name')" class="btn btn-sm btn-link p-0 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center">
                            <span class="me-1">Email Address</span>
                            <button wire:click="sortBy('email')" class="btn btn-sm btn-link p-0 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center">
                            <span class="me-1">Country</span>
                            <button wire:click="sortBy('country')" class="btn btn-sm btn-link p-0 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center">
                            <span class="me-1">City</span>
                            <button wire:click="sortBy('city')" class="btn btn-sm btn-link p-0 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center">
                            <span class="me-1">State</span>
                            <button wire:click="sortBy('state')" class="btn btn-sm btn-link p-0 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center">
                            <span class="me-1">Status</span>
                            <button wire:click="sortBy('status')" class="btn btn-sm btn-link p-0 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </div>
                    </th>

                    <th>Change Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer->full_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->country?->country_name ?? 'N/A' }}</td>
                        <td>{{ $customer->city }}</td>
                        <td>{{ $customer->state }}</td>
                        <td>
                            <span class="badge {{ $customer->status == 'active' ? 'bg-success' : 'bg-danger' }} ">
                                {{ $customer->status }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.registeredCustomers.updateStatus', $customer->id) }}" 
                                method="POST" 
                                style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-warning">
                                    Change Status
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>              
                @empty
                    <tr>
                        <td colspan="8" class="text-center p-5 text-muted">
                            <i class="fa-solid fa-bell-slash me-2"></i> No orders found matching your criteria.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <small class="text-muted">
            Showing {{ $customers->firstItem() }} to {{ $customers->lastItem() }} of {{ $customers->total() }} entries
        </small>
        
        <nav>
            {{ $customers->links("pagination::livewire-bootstrap") }}
        </nav>
    </div>
</div>