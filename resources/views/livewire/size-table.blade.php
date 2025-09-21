<div class="card shadow-sm border-0">
        

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6"> 
                    <label for="perPage" class="form-label me-2">Show</label>
                    <select wire:model.live="perPage" id="perPage" class="form-select form-select-sm w-auto d-inline">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="ms-2">entries</span>
                </div>

                <div class="col-md-6 text-end">
                    <input wire:model.debounce.300ms.live="search" type="text" class="form-control form-control-sm w-auto d-inline" placeholder="Search...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                    <th scope="col">
                        # 
                        <button wire:click="sortBy('id')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                            <i class="bi bi-arrow-down-up"></i>
                        </button>
                    </th>
                    <th scope="col">
                        Size Name 
                        <button wire:click="sortBy('name')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                            <i class="bi bi-arrow-down-up"></i>
                        </button>
                    </th>
                    <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sizes as $size)         
                        <tr>
                            <td>{{ $sizes->firstItem() + $loop->index }}</td>
                            <td>{{ $size->name }}</td>
                            <td class="text-center">  
                                <a href="{{ route('admin.shopSetting.size.edit', $size->id) }}" class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>                            
                                <x-delete-modal 
                                        id="{{ $size->id }}" 
                                        name="{{ $size->name}}" 
                                        action="{{ route('admin.shopSetting.size.destroy', $size->id)}}"
                                />                   
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="d-flex justify-content-between align-items-center my-3">
                <div>
                    Showing {{ $sizes->firstItem() }} to {{ $sizes->lastItem() }} of {{ $sizes->total() }} results
                </div>
                <div>
                    {{ $sizes->links('pagination::livewire-bootstrap') }}
                </div>
            </div>

        </div>
</div>