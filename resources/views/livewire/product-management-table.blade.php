<div>
    <div class="row mb-3">
        <div class="col-md-6 d-flex align-items-center">
            <label class="form-label me-2 mb-0">Show</label>
            <select class="form-select form-select-sm w-auto">
            <option>10</option>
            <option>25</option>
            <option>50</option>
            </select>
            <span class="ms-2">entries</span>
        </div>
        <div class="col-md-6 text-end">
            <input type="text" class="form-control form-control-sm w-auto d-inline" placeholder="Search...">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-light">
            <tr>
                <th># <i class="bi bi-arrow-down-up ms-1 text-muted"></i></th>
                <th>Photo</th>
                <th>Product Name <i class="bi bi-arrow-down-up ms-1 text-muted"></i></th>
                <th>Old Price <i class="bi bi-arrow-down-up ms-1 text-muted"></i></th>
                <th>(C) Price <i class="bi bi-arrow-down-up ms-1 text-muted"></i></th>
                <th>Quantity <i class="bi bi-arrow-down-up ms-1 text-muted"></i></th>
                <th>Featured? <i class="bi bi-arrow-down-up ms-1 text-muted"></i></th>
                <th>Active? <i class="bi bi-arrow-down-up ms-1 text-muted"></i></th>
                <th>Category <i class="bi bi-arrow-down-up ms-1 text-muted"></i></th>
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
                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>   
                @endforeach
            
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-2">
        <small class="text-muted">Showing 1 to 10 of 20 entries</small>
        <nav>
            <ul class="pagination pagination-sm mb-0">
            <li class="page-item disabled"><a class="page-link">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
