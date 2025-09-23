<div class="card shadow-sm mb-4">
    <div class="card-header bg-light">
        <h5 class="mb-0"><i class="bi bi-table"></i> View Shipping Costs</h5>
    </div>

    <div class="p-4 pb-0 row mb-3">
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

    <div class="card-body" style="padding-top: 0">
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
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
            <th scope="col">
                Country Amount
                <button wire:click="sortBy('amount')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                    <i class="bi bi-arrow-down-up"></i>
                </button>
            </th>
            <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries_shipping_cost as $shipping_cost)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $shipping_cost->country->country_name }}</td>
                        <td>${{ $shipping_cost->amount }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.shopSetting.shippingCost.edit', $shipping_cost->id) }}" class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil"></i> Edit
                            </a>    
                            <x-delete-modal 
                                        id="{{ $shipping_cost->id }}" 
                                        name="{{ $shipping_cost->country->country_name}}" 
                                        action="{{ route('admin.shopSetting.shippingCost.destroy', $shipping_cost->id)}}"
                            /> 
                        </td>
                    </tr>     
            @endforeach
        </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center">
                <div>
                    Showing {{ $countries_shipping_cost->firstItem() }} to {{ $countries_shipping_cost->lastItem() }} of {{ $countries_shipping_cost->total() }} result
                </div>

                <div>
                    {{ $countries_shipping_cost->links("pagination::livewire-bootstrap") }}
                </div>
        </div>
    </div>
    <div class="alert alert-danger mt-3 mb-0" role="alert">
        <i class="bi bi-exclamation-triangle"></i>
        If a country does not exist in the above list, the following "Rest of the World" shipping cost will be applied.
    </div>
    </div>
</div>
