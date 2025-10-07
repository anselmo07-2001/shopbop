<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0"><i class="bi bi-question-circle me-2"></i>View FAQs</h4>
        <a class="btn btn-dark" href="{{ route('admin.faq.create') }}">
            <i class="bi bi-plus-circle me-1"></i> Add FAQ
        </a>
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
            <input wire:model.live.debounce.300ms="search"  
                   type="text" class="form-control form-control-sm w-auto d-inline" placeholder="Search...">
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
                            <span class="me-1">Title</span>
                            <button wire:click="sortBy('title')" class="btn btn-sm btn-link p-0 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </div>
                    </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($faqs as $faq)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $faq->title }}</td>
                        <td>
                            <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil me-1"></i> Edit</a>
                            <x-delete-modal 
                                id="{{ $faq->id }}" 
                                name="{{ $faq->title }}" 
                                action="{{ route('admin.faq.destroy', $faq->id) }}"
                            /> 
                        </td>
                    </tr>    
                @empty
                    
                @endforelse
             </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <small class="text-muted">
            Showing {{ $faqs->firstItem() }} to {{ $faqs->lastItem() }} of {{ $faqs->total() }} entries
        </small>
        
        <nav>
            {{ $faqs->links("pagination::livewire-bootstrap") }}
        </nav>
    </div>
</div>