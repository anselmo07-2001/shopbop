<x-layout-admin-panel>
    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5><i class="fa fa-images me-2"></i> View Sliders</h5>
            <a class="btn btn-primary" href="admin-manageSlider-addSlider.html">
            <i class="fa fa-plus me-1"></i> Add Slider
            </a>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
            Show 
            <select class="form-select d-inline-block w-auto">
                <option>5</option>
                <option>10</option>
                <option>25</option>
                <option>50</option>
            </select> 
            entries
            </div>
            <div>
            <label class="me-2">Search:</label>
            <input type="search" class="form-control d-inline-block" style="width: 200px;">
            </div>
        </div>

                    
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                <th># <i class="fa fa-sort ms-1"></i></th>
                <th>Photo <i class="fa fa-sort ms-1"></i></th>
                <th>Heading <i class="fa fa-sort ms-1"></i></th>
                <th>Content <i class="fa fa-sort ms-1"></i></th>
                <th>Button Text <i class="fa fa-sort ms-1"></i></th>
                <th>Button URL <i class="fa fa-sort ms-1"></i></th>
                <th>Position <i class="fa fa-sort ms-1"></i></th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-success">
                <tr>
                <td>1</td>
                <td>
                    <img src="assets/uploads/product-featured-102.jpg" class="img-fluid rounded" alt="slider photo">
                </td>
                <td>Welcome to Ecommerce PHP</td>
                <td>Shop Online for Latest Women Accessories</td>
                <td>View Women Accessories</td>
                <td>product-category.php?id=4&amp;type=mid-category</td>
                <td>Center</td>
                <td>
                    <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</button>
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </td>
                </tr>
            </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div>
            Showing 1 to 1 of 1 entry
            </div>
            <nav>
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
            </ul>
            </nav>
        </div>

    </div>
</x-layout-admin-panel>