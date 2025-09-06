<x-layout>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />
    
    <div class="container my-5">
    <h4 class="mb-4 text-secondary text-center">Checkout</h4>

    <!-- Order Details -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-secondary text-white">Order Details</div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Size</th>
                    <th scope="col">Color</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>


            <tbody>
                @foreach ($checkout_items as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/products/' . $item['product']->featured_photo) }}" class="img-thumbnail" style="width:80px;" alt="Product">
                        </td>
                        <td>{{ $item['product']->name }}</td>
                        <td>{{ $item['size'] }}</td>
                        <td>{{ $item['color'] }}</td>
                        <td>${{ $item['product']->current_price }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($item['sub_total'], 2) }}</td>
                        <td>
                            <form method="POST" action={{ route('checkout.destroy', $item['cart_item_id']) }}>
                                @csrf
                                @method("delete")
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>    
                @endforeach
           </tbody>
            </table>
        </div>

        <!-- Order Summary -->
        <div class="d-flex justify-content-end">
            <div class="card" style="width: 300px;">
            <div class="card-body">
                <p class="d-flex justify-content-between">
                <span>Subtotal:</span> <strong>${{ number_format(collect($checkout_items)->sum("sub_total"), 2) }}</strong>
                </p>
                <p class="d-flex justify-content-between">
                <span>Shipping:</span> <strong>${{ $shipping_cost }}</strong>
                </p>
                <hr>
                <p class="d-flex justify-content-between fs-5">
                <span>Total:</span> <strong>${{ number_format(collect($checkout_items)->sum("sub_total") + $shipping_cost, 2) }}</strong>
                </p>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Address Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">Billing Address</div>
                <div class="card-body">
                <table class="table table-sm mb-0">
                    <tr><td><strong>Full Name</strong></td><td>Jun Rivera</td></tr>
                    <tr><td><strong>Company Name</strong></td><td>NA</td></tr>
                    <tr><td><strong>Phone Number</strong></td><td>09569608390</td></tr>
                    <tr><td><strong>Country</strong></td><td>Philippines</td></tr>
                    <tr><td><strong>Address</strong></td><td>666 Apple St Orange City</td></tr>
                    <tr><td><strong>City</strong></td><td>Orange City</td></tr>
                    <tr><td><strong>State</strong></td><td>SA</td></tr>
                    <tr><td><strong>Zip Code</strong></td><td>2009</td></tr>
                </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">Shipping Address</div>
            <div class="card-body">
            <table class="table table-sm mb-0">
                <tr><td><strong>Full Name</strong></td><td>Jun Rivera</td></tr>
                <tr><td><strong>Company Name</strong></td><td>NA</td></tr>
                <tr><td><strong>Phone Number</strong></td><td>09569608390</td></tr>
                <tr><td><strong>Country</strong></td><td>Philippines</td></tr>
                <tr><td><strong>Address</strong></td><td>666 Apple St Orange City</td></tr>
                <tr><td><strong>City</strong></td><td>Orange City</td></tr>
                <tr><td><strong>State</strong></td><td>SA</td></tr>
                <tr><td><strong>Zip Code</strong></td><td>2009</td></tr>
            </table>
            </div>
        </div>
        </div>
    </div>

    <!-- Payment Section -->
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">Payment Section</div>
        <div class="card-body">
        <div class="mb-3">
            <label for="paymentMethod" class="form-label">Select Payment Method *</label>
            <select id="paymentMethod" class="form-select">
            <option>Bank Deposit</option>
            <option>Credit Card</option>
            <option>PayPal</option>
            </select>
        </div>

        <div class="mb-3">
            <p><strong>Send to this Details</strong></p>
            <p class="mb-1">Bank Name: WestView Bank</p>
            <p class="mb-1">Account Number: CA100270589600</p>
            <p class="mb-1">Branch Name: CA Branch</p>
            <p class="mb-1">Country: USA</p>
        </div>

        <div class="mb-3">
            <label for="transactionInfo" class="form-label">Transaction Information</label>
            <textarea id="transactionInfo" class="form-control" rows="3" placeholder="Include transaction ID and other information correctly"></textarea>
        </div>

        <button class="btn btn-primary">Pay Now</button>
        </div>
    </div>
    </div>
</x-layout>