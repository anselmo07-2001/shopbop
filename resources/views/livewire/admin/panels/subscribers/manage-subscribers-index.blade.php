<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-envelope-check me-2"></i>Subscribers</h4>
            <div>
                <a href="#" class="btn btn-danger btn-sm me-2">
                    <i class="bi bi-x-circle me-1"></i> Remove Pending Subscribers
                </a>
                <a href="#" class="btn btn-success btn-sm">
                    <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export as CSV
                </a>
            </div>
    </div>


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
            <input wire:model.live.debounce.300ms="search"  type="text" class="form-control form-control-sm w-auto d-inline" placeholder="Search...">
        </div>
    </div>

                    
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
                            <span class="me-1">Subscriber Email</span>
                            <button wire:click="sortBy('email')" class="btn btn-sm btn-link p-0 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex align-items-center">
                            <span class="me-1">Status</span>
                            <button wire:click="sortBy('is_verified')" class="btn btn-sm btn-link p-0 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </div>
                    </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subscribers as $subscriber)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subscriber->email }}</td>
                        <td>
                            <span class="{{ $subscriber->is_verified ? 'badge bg-success' : 'badge bg-danger' }}">
                                {{ $subscriber->is_verified ? "Verified" : "Pending Verification" }}
                            </span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash me-1"></i> Delete
                            </a>
                        </td>
                    </tr>         
                @empty
                    <tr>
                        <td colspan="8" class="text-center p-5 text-muted">
                            <i class="fa-solid fa-bell-slash me-2"></i> No emails found matching your criteria.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
                
   <div class="d-flex justify-content-between align-items-center mt-3">
        <small class="text-muted">
            Showing {{ $subscribers->firstItem() }} to {{ $subscribers->lastItem() }} of {{ $subscribers->total() }} entries
        </small>
        
        <nav>
            {{ $subscribers->links("pagination::livewire-bootstrap") }}
        </nav>
    </div>

</div>