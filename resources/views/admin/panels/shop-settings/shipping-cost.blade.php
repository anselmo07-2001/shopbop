<x-layout-admin-panel>
    <div class="container-fluid">   

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
            <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add Shipping Cost</h5>
            </div>
            <div class="card-body">
            <form>
                <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label for="country" class="form-label">Select Country <span class="text-danger">*</span></label>
                    <select id="country" class="form-select">
                    <option selected disabled>Select a country</option>
                    <option value="1">Australia</option>
                    <option value="2">Pakistan</option>
                    <option value="3">United Arab Emirates</option>
                    <option value="4">United States</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                    <input type="number" id="amount" class="form-control" placeholder="Enter amount">
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success px-4">Add</button>
                </div>
                </div>
            </form>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
            <h5 class="mb-0"><i class="bi bi-table"></i> View Shipping Costs</h5>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Country Name</th>
                    <th scope="col">Country Amount</th>
                    <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>Australia</td>
                    <td>$8</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary me-1">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                    </tr>
                    <tr>
                    <td>2</td>
                    <td>Pakistan</td>
                    <td>$10</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary me-1">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                    </tr>
                    <tr>
                    <td>3</td>
                    <td>United Arab Emirates</td>
                    <td>$11</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary me-1">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                    </tr>
                    <tr>
                    <td>4</td>
                    <td>United States</td>
                    <td>$0</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary me-1">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="alert alert-danger mt-3 mb-0" role="alert">
                <i class="bi bi-exclamation-triangle"></i>
                If a country does not exist in the above list, the following "Rest of the World" shipping cost will be applied.
            </div>
            </div>
        </div>
             
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="bi bi-globe"></i> Shipping Cost (Rest of the world)</h5>
            </div>
            <div class="card-body">
                <form>
                <div class="row g-3 align-items-center">
                    <div class="col-md-6">
                    <label for="restAmount" class="form-label">Amount <span class="text-danger">*</span></label>
                    <input type="number" id="restAmount" class="form-control" placeholder="Enter amount">
                    </div>
                    <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        
    </div>
</x-layout-admin-panel>