<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
            <label class="form-label me-2">Show</label>
            <select wire:model.live="perPage" class="form-select form-select-sm w-auto d-inline">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <span class="ms-2">entries</span>
            </div>
            <div class="col-md-6 text-end">
            <input  wire:model.debounce.300ms.live="search" type="text" class="form-control form-control-sm w-auto d-inline" placeholder="Search...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">
                        ID
                        <button wire:click="sortBy('id')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up"></i>
                        </button>
                    </th>
                    <th scope="col">
                        End Level Category
                        <button wire:click="sortBy('name')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up"></i>
                        </button>
                    </th>
                    <th scope="col">
                        Mid Level Category
                        <button wire:click="sortBy('mid_level_category')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up"></i>
                        </button>
                    </th>
                    <th scope="col">
                        Top Level Category
                        <button wire:click="sortBy('top_level_category')" wire:click="sortBy('id')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up"></i>
                        </button>
                    </th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($end_level_categories as $e_category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $e_category->name }}</td>
                        <td>{{ $e_category->midCategory->name }}</td>
                        <td>{{ $e_category->midCategory->topCategory->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.shopSetting.endLevelCategory.edit', $e_category->id) }}" 
                               class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil"></i> Edit
                            </a> 
                            <x-delete-modal 
                                id="{{ $e_category->id }}" 
                                name="{{ $e_category->name}}" 
                                action="{{ route('admin.shopSetting.endLevelCategory.destroy', $e_category->id)}}"
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
                Showing {{ $end_level_categories->firstItem() }} to {{ $end_level_categories->lastItem() }} of {{ $end_level_categories->total() }} results
            </div>
            <div>
                {{ $end_level_categories->links('pagination::livewire-bootstrap') }}
            </div>
        </div>
    </div>
</div>