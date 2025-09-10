<x-layout>
    <x-flash-message session_name="success" />
    <x-flash-message session_name="error" />

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
                    <form class="row g-3" method="POST" action="{{ route('dashboard.update-profile') }}">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input name="full_name" type="text" class="form-control" value="{{ $user->full_name }}">
                            @error('full_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Company Name</label>
                            <input name="company_name" type="text" class="form-control" value="{{ $user->company_name }}">
                            @error('company_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input name="phone_number" type="text" class="form-control" value="{{ $user->phone_number }}">
                            @error('phone_number')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input name="address" type="text" class="form-control" value="{{ $user->address }}">
                            @error('address')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input name="city" type="text" class="form-control" value="{{ $user->city }}">
                            @error('city')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Country</label>
                            <select name="country_id" class="form-select">
                                 @foreach ($countries as $country)
                                    <option 
                                        {{ $user->country_id == $country["id"] ? "selected" : "" }} 
                                        value={{ $country["id"] }}
                                        > 
                                             {{ $country["country_name"] }}
                                    </option>
                                 @endforeach
                            </select>
                            @error('country_id')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Zip Code</label>
                            <input name="zip" type="text" class="form-control" value="{{ $user->zip }}">
                            @error('zip')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">State</label>
                            <input name="state" type="text" class="form-control" value="{{ $user->state }}">
                            @error('state')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>

                <!-- Billing & Shipping -->
                <div class="tab-pane fade" id="v-pills-billing" role="tabpanel">
                    <form method="POST" action="{{ route('dashboard.update-address') }}"  class="row g-3 mb-4">
                        @csrf
                        <h4 class="mb-3">Billing Address</h4>      
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input name="billing_name" type="text" class="form-control" value="{{ $user->billing_name }}">
                            @error('billing_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Company Name</label>
                            <input name="billing_company_name" type="text" class="form-control" value="{{ $user->billing_company_name }}">
                            @error('billing_company_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input name="billing_phone_number" type="text" class="form-control" value="{{ $user->billing_phone_number }}">
                            @error('billing_phone_number')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Country</label>
                            <select name="billing_country" class="form-select">
                                @foreach ($countries as $country)
                                    <option {{ $user->country_id == $country["id"] ? "selected" : ""}} value="{{ $country['id'] }}">
                                        {{ $country["country_name"] }}
                                    </option>
                                @endforeach
                            <select>
                            @error('billing_country')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input name="billing_address" type="text" class="form-control" value="{{ $user->billing_address }}">
                            @error('billing_address')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input name="billing_city" type="text" class="form-control" value="{{ $user->billing_city }}">
                            @error('billing_city')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">State</label>
                            <input name="billing_state" type="text" class="form-control" value="{{ $user->billing_state }}">
                            @error('billing_state')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Zip Code</label>
                            <input name="billing_zip" type="text" class="form-control" value="{{ $user->billing_zip }}">
                            @error('billing_zip')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <h4 class="mb-2">Shipping Address</h4>
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input name="shipping_name" type="text" class="form-control" value="{{ $user->shipping_name }}" >
                            @error('shipping_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Company Name</label>
                            <input name="shipping_company_name" type="text" class="form-control" value="{{ $user->shipping_company_name }}">
                            @error('shipping_company_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input name="shipping_phone_number" type="text" class="form-control" value="{{ $user->shipping_phone_number }}">
                            @error('shipping_phone_number')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Country</label>
                            <select name="shipping_country" class="form-select">
                                @foreach ($countries as $country)
                                    <option {{ $user->country_id == $country["id"] ? "selected" : ""}} value="{{ $country['id'] }}">
                                        {{ $country["country_name"] }}
                                    </option>
                                @endforeach
                                @error('shipping_country')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            <select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input name="shipping_address" type="text" class="form-control" value="{{ $user->shipping_address }}">
                            @error('shipping_address')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input name="shipping_city" type="text" class="form-control" value="{{ $user->shipping_city }}">
                            @error('shipping_city')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">State</label>
                            <input name="shipping_state" type="text" class="form-control" value="{{ $user->shipping_state }}">
                            @error('shipping_state')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Zip Code</label>
                            <input name="shipping_zip" type="text" class="form-control" value="{{ $user->shipping_zip }}">
                            @error('shipping_zip')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
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
                            <th>#</th>
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
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        @foreach ($order as $item)
                                            <div class="mb-3">
                                                Product Name: {{ $item->product->name }}
                                                Size: {{ $item->size }}
                                                Color: {{ $item->color }}
                                                Quantity:  {{ $item->quantity }}
                                                Unit Price:  {{ $item->unit_price }}
                                            </div>
                                        @endforeach
                                    </td>

                                    @foreach ($order->first()->payments as $payment)
                                            <td>{{ $payment->payment_date }}</td>   
                                            <td>{{ $payment->txn_id }}</td>
                                            <td>${{ $payment->paid_amount }}</td>
                                            <td><span class="badge bg-success">{{ $payment->payment_status }}</span></td>
                                            <td>
                                                {{ $payment->payment_method == "bank_deposit" ? "Bank Deposit" : "" }}
                                            </td>
                                            <td>{{ $payment->order_number }}</td>           
                                     @endforeach   
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </div>
</x-layout>

