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
                    <tr><td><strong>Full Name</strong></td><td>{{ $user->billing_name ?? '-' }}</td></tr>
                    <tr><td><strong>Company Name</strong></td><td>{{ $user->billing_company_name ?? '-' }}</td></tr>
                    <tr><td><strong>Phone Number</strong></td><td>{{ $user->billing_phone_number ?? '-' }}</td></tr>
                    <tr><td><strong>Country</strong></td><td>{{ $user->billing_country ?? '-' }}</td></tr>
                    <tr><td><strong>Address</strong></td><td>{{ $user->billing_address ?? '-' }}</td></tr>
                    <tr><td><strong>City</strong></td><td>{{ $user->billing_city ?? '-' }}</td></tr>
                    <tr><td><strong>State</strong></td><td>{{ $user->billing_state ?? '-' }}</td></tr>
                    <tr><td><strong>Zip Code</strong></td><td>{{ $user->billing_zip ?? '-' }}</td></tr>
                </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">Shipping Address</div>
                <div class="card-body">
                <table class="table table-sm mb-0">
                    <tr><td><strong>Full Name</strong></td><td>{{ $user->shipping_name ?? '-' }}</td></tr>
                    <tr><td><strong>Company Name</strong></td><td>{{ $user->shipping_company_name ?? '-' }}</td></tr>
                    <tr><td><strong>Phone Number</strong></td><td>{{ $user->shipping_phone_number  ?? '-'}}</td></tr>
                    <tr><td><strong>Country</strong></td><td>{{ $user->shipping_country ?? '-' }}</td></tr>
                    <tr><td><strong>Address</strong></td><td>{{ $user->shipping_address ?? '-' }}</td></tr>
                    <tr><td><strong>City</strong></td><td>{{ $user->shipping_city ?? '-' }}</td></tr>
                    <tr><td><strong>State</strong></td><td>{{ $user->shipping_state ?? '-' }}</td></tr>
                    <tr><td><strong>Zip Code</strong></td><td>{{ $user->shipping_zip ?? '-' }}</td></tr>
                </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Section -->
    <form id="checkoutForm" method="POST" action="{{ route('checkout.placeOrder') }}">
        @csrf
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">Payment Section</div>
            <div class="card-body">
            <div class="mb-3">
                <label for="paymentMethod" class="form-label">Select Payment Method *</label>
                <select name="payment_method" id="paymentMethod" class="form-select">
                    <option selected></option>
                    <option value="bank_deposit">Bank Deposit</option>
                    <option value="stripe">Credit/Debit Card</option>
                </select>
            </div>

            <div class="mb-3" id="bankDetailsSection">
                <p><strong>Send to this Details</strong></p>
                <div>{!! nl2br(e($bank_detail)) !!}</div>
            </div>

            <!-- Transaction Info Textarea (hidden unless bank deposit) -->
            <div class="mb-3" id="transactionSection" style="display: none;">       
                <label for="transactionInfo" class="form-label">Transaction Information</label>
                <textarea name="transactionInfo" id="transactionInfo" class="form-control" rows="3" 
                    placeholder="Include transaction ID and other information correctly"></textarea> 
            </div>

            <!-- Stripe Card Input (hidden by default) -->
            <div id="card-section" style="display: none;">
                <label for="card-element" class="form-label">Credit/Debit Card Details</label>
                <div id="card-element" class="form-control"></div>
                <div id="card-errors" class="text-danger mt-2"></div>
            </div>

            <input type="hidden" name="stripe_payment_method" id="stripePaymentMethod">


            <button class="btn btn-primary">Pay Now</button>   
        </div>
    </form> 
</x-layout>


<script src="https://js.stripe.com/v3/"></script>

<script>
window.addEventListener("load", function() {
    console.log("✅ Stripe script running after page load");

    // DOM elements
    const paymentMethod = document.getElementById("paymentMethod");
    const transactionInfoSection = document.getElementById("transactionSection");
    const bankDetailsSection = document.getElementById("bankDetailsSection");
    const stripeCardSection = document.getElementById("card-section");
    const form = document.getElementById("checkoutForm");
    const stripePaymentInput = document.getElementById("stripePaymentMethod");
    const cardErrors = document.getElementById("card-errors");

    console.log("📋 Form found?", form);

    // Hide all sections initially
    transactionInfoSection.style.display = "none";
    bankDetailsSection.style.display = "none";
    stripeCardSection.style.display = "none";

    // Initialize Stripe
    const stripe = Stripe("{{ config('services.stripe.key') }}");
    const elements = stripe.elements();
    const cardElement = elements.create("card");
    cardElement.mount("#card-element");

    // Handle payment method change
    paymentMethod.addEventListener("change", function() {
        const selected = paymentMethod.value;
        console.log("🔁 Payment method changed:", selected);

        if (selected === "stripe") {
            stripeCardSection.style.display = "block";
            transactionInfoSection.style.display = "none";
            bankDetailsSection.style.display = "none";
        } else if (selected === "bank_deposit") {
            stripeCardSection.style.display = "none";
            transactionInfoSection.style.display = "block";
            bankDetailsSection.style.display = "block";
        } else {
            stripeCardSection.style.display = "none";
            transactionInfoSection.style.display = "none";
            bankDetailsSection.style.display = "none";
        }
    });

    // Handle Stripe payment method creation
    form.addEventListener("submit", async function(e) {
        console.log("🚀 Form submit triggered!");
        
        if (paymentMethod.value === "stripe") {
            e.preventDefault();
            console.log("🟡 Submitting with Stripe...");

            const { paymentMethod: stripePM, error } = await stripe.createPaymentMethod({
                type: "card",
                card: cardElement,
            });

            console.log("🧩 Stripe response:", { stripePM, error });

            if (error) {
                console.error("❌ Stripe error:", error);
                cardErrors.textContent = error.message;
            } else {
                stripePaymentInput.value = stripePM.id;
                console.log("✅ Stripe Payment Method ID:", stripePM.id);
                form.submit(); // Proceed to Laravel controller
            }
        }
    });
});
</script>
