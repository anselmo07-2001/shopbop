<div>
    <div class="row mb-3">
        <div class="col-md-6 d-flex align-items-center">
            <label class="form-label me-2 mb-0">Show</label>
            <select wire:model.live="perPage" class="form-select form-select-sm w-auto">
            <option value="10" >10</option>
            <option value="25" >25</option>
            <option value="50" >50</option>
            </select>
            <span class="ms-2">entries</span>
        </div>
        <div class="col-md-6 text-end">
            <input wire:model.debounce.300ms.live="search" type="text" class="form-control form-control-sm w-auto d-inline" placeholder="Search...">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-light">
            <tr>
                <th>
                    # 
                    <button wire:click="sortBy('id')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                    </button>
                </th>
                <th>Photo</th>
                <th>
                    Product Name 
                    <button wire:click="sortBy('name')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                    </button>
                </th>
                <th>
                    Old Price 
                    <button wire:click="sortBy('original_price')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                    </button>
                </th>
                <th>
                    (C) Price 
                    <button wire:click="sortBy('current_price')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                    </button>
                </th>
                <th>
                    Quantity 
                    <button wire:click="sortBy('quantity')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                    </button>
                </th>
                <th>
                    Featured? 
                    <button wire:click="sortBy('is_featured')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                    </button>
                </th>
                <th>
                    Active? 
                    <button wire:click="sortBy('is_active')" class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                        <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                    </button>
                </th>
                <th>
                    Category
                    <button wire:click="sortBy('category')" class="btn btn-sm btn-link p-0 ms-1 text-secondary"> 
                        <i class="bi bi-arrow-down-up ms-1 text-muted"></i>
                    </button>
                </th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('products/' . $product->featured_photo  ) }}" alt="Product" class="img-thumbnail" width="50"></td>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->original_price }}</td>
                        <td>${{ $product->current_price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td><span class="badge {{ $product->is_featured ? 'bg-success' : 'bg-danger' }}">{{ $product->is_featured ? "Yes" : "No" }}</span></td>
                        <td><span class="badge {{ $product->is_active ? 'bg-success' : 'bg-danger' }}">{{ $product->is_active ? "Yes" : "No" }}</span></td>
                        <td>
                            {{ $product->endCategory->midCategory->topCategory->name }} <br>
                            {{ $product->endCategory->midCategory->name }} <br>  
                            {{ $product->endCategory->name }}
                        </td>
                        <td>
                        <a href="{{ route('admin.productManagement.edit', $product->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <x-delete-modal 
                                id="{{ $product->id }}" 
                                name="{{ $product->name}}" 
                                action="{{ route('admin.productManagement.destroy' , $product->id )}}"
                        /> 
                        </td>
                    </tr>   
                @endforeach
            
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center my-3">
        <div>
            Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results
        </div>
        <div>
            {{ $products->links('pagination::livewire-bootstrap') }}
        </div>
    </div>
</div>
