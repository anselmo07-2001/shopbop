<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0"><i class="bi bi-question-circle me-2"></i>View FAQs</h4>
        <a class="btn btn-dark" href="admin-faq-add.html">
            <i class="bi bi-plus-circle me-1"></i> Add FAQ
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

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID <i class="bi bi-arrow-down-up ms-1 text-muted"></i></th>
                    <th>Title <i class="bi bi-arrow-down-up ms-1 text-muted"></i></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>How to find an item?</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-pencil me-1"></i> Edit</a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash me-1"></i> Delete</a>
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