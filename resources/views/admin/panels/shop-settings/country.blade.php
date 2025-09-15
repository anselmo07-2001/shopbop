<x-layout-admin-panel>
    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-globe me-2"></i>Manage Countries</h4>
            <button class="btn btn-dark">
                <i class="bi bi-plus-circle me-1"></i> Add New
            </button>
        </div>
        
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label me-2">Show</label>
                        <select class="form-select form-select-sm w-auto d-inline">
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
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">
                                    # 
                                    <button class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </th>
                                <th scope="col">
                                    Country Name
                                    <button class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </th>
                                <th scope="col">
                                    Country Code
                                    <button class="btn btn-sm btn-link p-0 ms-1 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </th>
                                <th scope="col">
                                    Flag
                                </th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Philippines</td>
                                <td>PH</td>
                                <td>
                                    <span class="fi fi-ph" style="font-size: 1.5rem;"></span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>United States</td>
                                <td>US</td>
                                <td>
                                    <span class="fi fi-us" style="font-size: 1.5rem;"></span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- more rows here -->
                        </tbody>
                    </table>
                </div>

                <!-- Footer -->
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Showing 1 to 10 of 50 entries</small>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-layout-admin-panel>