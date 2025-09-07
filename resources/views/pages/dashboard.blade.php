<x-layout>
    <div class="container my-5">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3 mb-4">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab">Update Profile</button>
                <button class="nav-link" id="v-pills-billing-tab" data-bs-toggle="pill" data-bs-target="#v-pills-billing" type="button" role="tab">Billing & Shipping</button>
                <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab">Update Password</button>
                <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab">Orders History</button>
            </div>
            </div>

            <!-- Tab Content -->
            <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">

                <!-- Update Profile -->
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel">
                <h4 class="mb-3">Update Profile</h4>
                <form class="row g-3">
                    <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Company Name</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                    <label class="form-label">Zip Code</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                    <label class="form-label">State</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-dark">Save Changes</button>
                    </div>
                </form>
                </div>

                <!-- Billing & Shipping -->
                <div class="tab-pane fade" id="v-pills-billing" role="tabpanel">
                <h4 class="mb-3">Billing Address</h4>
                <form class="row g-3 mb-4">
                    <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Company Name</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">State</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Zip Code</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-dark">Save Billing Info</button>
                    </div>
                </form>

                <h4 class="mb-3">Shipping Address</h4>
                <form class="row g-3">
                    <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Company Name</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">State</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Zip Code</label>
                    <input type="text" class="form-control">
                    </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-dark">Save Shipping Info</button>
                    </div>
                </form>
                </div>

                <!-- Update Password -->
                <div class="tab-pane fade" id="v-pills-password" role="tabpanel">
                <h4 class="mb-3">Update Password</h4>
                <form class="row g-3">
                    <div class="col-12">
                    <label class="form-label">Current Password</label>
                    <input type="password" class="form-control">
                    </div>
                    <div class="col-12">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control">
                    </div>
                    <div class="col-12">
                    <label class="form-label">Retype New Password</label>
                    <input type="password" class="form-control">
                    </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-dark">Update Password</button>
                    </div>
                </form>
                </div>

                <!-- Orders History -->
                <div class="tab-pane fade" id="v-pills-orders" role="tabpanel">
                <h4 class="mb-3">Orders History</h4>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                        <th>Order ID</th>
                        <th>Product Details</th>
                        <th>Payment Date</th>
                        <th>Transaction ID</th>
                        <th>Paid Amount</th>
                        <th>Status</th>
                        <th>Method</th>
                        <th>Payment ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>#1021</td>
                        <td>
                            Amazfit GTS 3 (Size: M, Color: Black)<br>
                            Qty: 1<br>
                            Price: $199
                        </td>
                        <td>2025-08-20 14:22</td>
                        <td>TXN-098765</td>
                        <td>$199</td>
                        <td><span class="badge bg-success">Paid</span></td>
                        <td>Credit Card</td>
                        <td>PMT-8765</td>
                        </tr>
                        <tr>
                        <td>#1022</td>
                        <td>
                            Button Down Shirt (Size: L, Color: Blue)<br>
                            Qty: 2<br>
                            Price: $258
                        </td>
                        <td>2025-08-22 09:18</td>
                        <td>TXN-098766</td>
                        <td>$258</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>PayPal</td>
                        <td>PMT-8766</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>

            </div>
            </div>
        </div>
    </div>
</x-layout>