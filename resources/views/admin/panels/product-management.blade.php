<x-layout-admin-panel>
   <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-box-seam me-2"></i>Products</h4>
            <a class="btn btn-dark" href="admin-productManagement-add.html">
                <i class="bi bi-plus-circle me-1"></i> Add Product
            </a>
        </div>

        
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

        <!-- Table -->
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
                <tr>
                    <td>1</td>
                    <td><img src="assets/uploads/product-featured-90.jpg" alt="Product" class="img-thumbnail" width="50"></td>
                    <td>Women's Plus-Size Shirt Dress with Gold Hardware</td>
                    <td>$190</td>
                    <td>$169</td>
                    <td>112</td>
                    <td><span class="badge bg-success">Yes</span></td>
                    <td><span class="badge bg-success">Yes</span></td>
                    <td>Women <br> Clothing <br> Dresses</td>
                    <td>
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
               
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
</x-layout-admin-panel>