<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0"><i class="fa-solid fa-boxes-packing me-2"></i>View Orders</h4>
    </div>

    <!-- Table -->
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
                                <div class="d-flex align-items-center">
                                    <span class="me-1">#</span>
                                    <button class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col">
                                <div class="d-flex align-items-center">
                                    <span class="me-1">Customer Details</span>
                                    <button class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col">
                                <div class="d-flex align-items-center">
                                    <span class="me-1">Product Details</span>
                                    <button class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col">
                                <div class="d-flex align-items-center">
                                    <span class="me-1">Payment Information</span>
                                    <button class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col">
                                <div class="d-flex align-items-center">
                                    <span class="me-1">Paid Amount</span>
                                    <button class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col">
                                <div class="d-flex align-items-center">
                                    <span class="me-1">Payment Status</span>
                                    <button class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col">
                                <div class="d-flex align-items-center">
                                    <span class="me-1">Shipping Status</span>
                                    <button class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $orderNumber => $group)    
                            @php
                                $firstOrder = $group->first();
                            @endphp      

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>Id:</strong> {{ $firstOrder->customer->id}}<br>
                                    <strong>Name:</strong> {{ $firstOrder->customer->full_name}}<br>
                                    <strong>Email:</strong> {{ $firstOrder->customer->email}}<br>
                                    <button class="btn btn-warning btn-sm mt-2">Send Message</button>
                                </td>
                                <td>
                                    @foreach ($group as $order)
                                        <div>
                                            <p><strong>Product: </strong>{{ $order->product->name }}<br>
                                            <strong>Size:</strong> {{ $order->size }}, <strong>Color:</strong> {{ $order->color }}<br>
                                            <strong>Quantity:</strong> {{ $order->quantity }}, <strong>Unit Price:</strong> ${{ $order->unit_price}}</p>
                                        </div>                                                    
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($firstOrder->payments as $payment)              
                                        <div>
                                            <strong>Payment Method:</strong> <span class="text-danger">{{ ucwords(str_replace("_", " ", $payment->payment_method)) }}</span><br>
                                            <strong>Payment Id:</strong> {{ $payment->order_number }}<br>
                                            <strong>Date:</strong> {{ $payment->created_at }}<br>
                                            <strong>Transaction Info:</strong> {{ $payment->bank_transaction_info }}
                                        </div> 
                                    @endforeach
                                </td>

                                @foreach ($firstOrder->payments as $payment)    
                                    <td>{{ $payment->paid_amount}}</td>
                                    <td>{{ $payment->payment_status}}</td>
                                    <td>{{ $payment->shipping_status}}</td>
                                @endforeach

                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

             <!-- Footer -->
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Showing 1 to 5 of 5 entries</small>
                <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
                </nav>
            </div>
        </div>
    </div>    
</div>