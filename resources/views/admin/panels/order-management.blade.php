<x-layout-admin-panel>
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5><i class="fa fa-eye me-2"></i> View Orders</h5>
            <div>
            <label class="me-2">Search:</label>
            <input type="search" class="form-control d-inline-block" style="width: 200px;">
            </div>
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
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                <th># <i class="fa fa-sort ms-1"></i></th>
                <th>Customer <i class="fa fa-sort ms-1"></i></th>
                <th>Product Details <i class="fa fa-sort ms-1"></i></th>
                <th>Payment Information <i class="fa fa-sort ms-1"></i></th>
                <th>Paid Amount <i class="fa fa-sort ms-1"></i></th>
                <th>Payment Status <i class="fa fa-sort ms-1"></i></th>
                <th>Shipping Status <i class="fa fa-sort ms-1"></i></th>
                <th>Action <i class="fa fa-sort ms-1"></i></th>
                </tr>
            </thead>
            <tbody class="table-success">
                <tr>
                <td>1</td>
                <td>
                    <strong>Id:</strong> 11<br>
                    <strong>Name:</strong> Jun Rivera<br>
                    <strong>Email:</strong> jun@gmail.com<br>
                    <button class="btn btn-warning btn-sm mt-2">Send Message</button>
                </td>
                <td>
                    <p><strong>Product:</strong> WD 5TB Elements Portable External Hard Drive HDD<br>
                    <strong>Size:</strong> 5T, <strong>Color:</strong> Black<br>
                    <strong>Quantity:</strong> 2, <strong>Unit Price:</strong> 149</p>
                </td>
                <td>
                    <strong>Payment Method:</strong> <span class="text-danger">Bank Deposit</span><br>
                    <strong>Payment Id:</strong> 1755371881<br>
                    <strong>Date:</strong> 2025-08-16 12:18:01<br>
                    <strong>Transaction Info:</strong> Bank Name: WestView Bank, Account Number: CA100270589600
                </td>
                <td>$893</td>
                <td>Completed</td>
                <td>Completed</td>
                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                </tr>

                <tr>
                <td>2</td>
                <td>
                    <strong>Id:</strong> 11<br>
                    <strong>Name:</strong> Jun Rivera<br>
                    <strong>Email:</strong> jun@gmail.com<br>
                    <button class="btn btn-warning btn-sm mt-2">Send Message</button>
                </td>
                <td>
                    <p><strong>Product:</strong> Men's Ultra Cotton T-Shirt, Multipack<br>
                    <strong>Size:</strong> L, <strong>Color:</strong> Black<br>
                    <strong>Quantity:</strong> 3, <strong>Unit Price:</strong> 19</p>
                </td>
                <td>
                    <strong>Payment Method:</strong> <span class="text-danger">PayPal</span><br>
                    <strong>Payment Id:</strong> 1755371601<br>
                    <strong>Date:</strong> 2025-08-16 12:13:21
                </td>
                <td>$240</td>
                <td>Completed</td>
                <td>Pending</td>
                <td>
                    <button class="btn btn-success btn-sm">Mark Complete</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
                </tr>
            </tbody>
            </table>
        </div>

                    
        <div class="d-flex justify-content-between align-items-center">
            <div>
            Showing 1 to 6 of 6 entries
            </div>
            <nav>
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </nav>
        </div>
    </div>
</x-layout-admin-panel>