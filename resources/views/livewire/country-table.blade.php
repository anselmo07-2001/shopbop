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
                            Country Name
                            <button wire:click="sortBy('country_name')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                                <i class="bi bi-arrow-down-up"></i>
                            </button>
                        </th> 
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $country->country_name }}</td>          
                            <td class="text-center">
                                <a href="{{ route('admin.shopSetting.country.edit', $country->id) }}" class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>      
                                <x-delete-modal 
                                        id="{{ $country->id }}" 
                                        name="{{ $country->country_name}}" 
                                        action="{{ route('admin.shopSetting.country.destroy', $country->id)}}"
                                />  
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="d-flex justify-content-between align-items-center">
             <div>
                Showing {{ $countries->firstItem() }} to {{ $countries->lastItem() }} of {{ $countries->total() }} result
            </div>

            <div>
                {{ $countries->links("pagination::livewire-bootstrap") }}
            </div>
        </div>
    </div>
</div>