<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-envelope-check me-2"></i>Subscribers</h4>
            <div class="d-flex align-items-center">
                <div>

                    <!-- Delete All Pending Subscribers Modal -->
                    <div class="modal fade" id="confirmDeleteAllModal" tabindex="-1" aria-labelledby="confirmDeleteAllLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteAllLabel">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to remove <strong>all pending subscribers</strong>?<br>
                                    This action cannot be undone.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form method="POST" action="{{ route('admin.subscribers.destroyPendingSubscribers') }}" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Yes, Delete All</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <button class="btn btn-danger btn-sm me-2" data-bs-toggle="modal" data-bs-target="#confirmDeleteAllModal">
                        <i class="bi bi-x-circle me-1"></i> Remove Pending Subscribers
                    </button>   

                </div>
                <div>
                    <a href="{{ route('admin.subscribers.export') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export as CSV
                    </a>
                </div>
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
                            <x-delete-modal 
                                id="{{ $subscriber->id }}" 
                                name="{{ $subscriber->email }}" 
                                action="{{ route('admin.subscribers.destroy', $subscriber->id ) }}"
                            /> 
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