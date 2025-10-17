<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0"><i class="fa-solid fa-boxes-packing me-2"></i>View Orders</h4>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row mb-3 align-items-center">
                <div class="col-md-6 d-flex align-items-center">
                    <label class="form-label me-2 mb-0">Show</label>
                    <select wire:model.live="limit" class="form-select form-select-sm w-auto d-inline">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="5">5</option>
                    </select>
                    <span class="ms-2">entries</span>
                </div>
                <div class="col-md-6 text-end">
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="search" 
                        class="form-control form-control-sm w-auto d-inline" 
                        placeholder="Search by Order #..."
                    >
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">
                                <div class="d-flex align-items-center">
                                    <span class="me-1">#</span>
                                    <button wire:click="sortBy('id')" class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col">
                                <div class="d-flex align-items-center">
                                    <span class="me-1">Customer Details</span>
                                    <button wire:click="sortBy('customer_id')" class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col">Product Details</th> 

                            <th scope="col">
                                <div class="d-flex align-items-center">
                                    <span class="me-1">Payment Information</span>
                                    <button wire:click="sortBy('order_number')" class="btn btn-sm btn-link p-0 text-secondary">
                                        <i class="bi bi-arrow-down-up"></i>
                                    </button>
                                </div>
                            </th>

                            <th scope="col">Total Payment</th>
                            
                            <th scope="col">Payment Status</th>
                            
                            <th scope="col">Shipping Status</th>

                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $orderNumber => $group)    
                            @php
                                $firstOrder = $group->first();
                                
                                $totalPaidAmount = $group->sum(function($order) { 
                                    return $order->payments->sum('paid_amount'); 
                                });

                                $paymentStatus = $firstOrder->payments->pluck('payment_status')->unique()->implode(', ');
                                $shippingStatus = $firstOrder->payments->pluck('shipping_status')->unique()->implode(', ');

                            @endphp
                            <tr>
                                <td>{{ $orders->firstItem() + $loop->index }}</td> 
                                <td>
                                    <strong>Order #:</strong> {{ $orderNumber }}<br>
                                    <strong>Id:</strong> {{ optional($firstOrder->customer)->id }}<br>
                                    <strong>Name:</strong> {{ optional($firstOrder->customer)->full_name }}<br>
                                    <strong>Email:</strong> {{ optional($firstOrder->customer)->email }}<br>


                                <!-- Modal Send Message -->    
                                    @php
                                        $modalId = "messageModal" . $firstOrder->id;
                                    @endphp

                                    <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.orderManagement.sendMessage') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="messageModalLabel">Send Message</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    
                                                    <div class="modal-body">
                                                        <input type="hidden" id="email" name="email" value="{{ optional($firstOrder->customer)->email }}">
                                                        
                                                        <div class="mb-3">
                                                            <label for="subject" class="form-label">Subject</label>
                                                            <input type="text" class="form-control" id="subject" name="subject" required value="{{ old('subject') }}">
                                                             <x-error-input-message field="subject"/>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="message" class="form-label">Message</label>
                                                            <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
                                                            <x-error-input-message field="message"/>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Send</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
              
                                    <button class="btn btn-warning btn-sm mt-2"
                                            data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">
                                        Send Message
                                    </button>

                                </td>
                                <td>
                                    @foreach ($group as $order)
                                        <div class="mb-2 @if(!$loop->last) border-bottom pb-2 @endif">
                                            <p class="mb-1">
                                                <strong>Product: </strong>{{ optional($order->product)->name }}<br>
                                                <strong>Size:</strong> {{ $order->size ?? 'N/A' }}, <strong>Color:</strong> {{ $order->color ?? 'N/A' }}<br>
                                                <strong>Quantity:</strong> {{ $order->quantity ?? 0 }}, <strong>Unit Price:</strong> ${{ number_format($order->unit_price ?? 0, 2)}}
                                            </p>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    @php
                                       $order_cost = $group->sum(fn($group) => $group->quantity * $group->unit_price);
                                    @endphp

                                    @foreach ($firstOrder->payments as $payment) 
                                        <div class="mb-2">


                                            <strong>Payment Method:</strong> 
                                                @php
                                                    $display_method = $payment->payment_method === 'stripe'
                                                        ? 'Credit / Debit Card'
                                                        : ucfirst(str_replace('_', ' ', $payment->payment_method));
                                                @endphp

                                                <span class="text-danger">
                                                    {{ $display_method }}
                                                </span><br>
                                            {{-- <strong>Payment Id (Txn):</strong> {{ $payment->txn_id }}<br> --}}
                                            <strong>Date:</strong> {{ optional($payment->created_at)->format('Y-m-d H:i') }}<br>
                                            <strong>Transaction Info:</strong> {{ $payment->bank_transaction_info }}<br>
                                            <strong>Shipping Cost:</strong> ${{ number_format($payment->shipping_cost,2) }}<br>
                                            <strong>Order Cost:</strong> ${{ number_format($order_cost,2) }}
                                        </div> 
                                    @endforeach
                                </td>

                                <td>${{ number_format($order->payments->sum('paid_amount'), 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $paymentStatus === 'paid' ? 'success' : 'warning' }}">
                                        {{ ucwords($paymentStatus) }}
                                    </span>
                                    @if ($paymentStatus === "pending")
                                        <form action="{{ route('admin.orderManagement.updatePaymentStatus', $firstOrder->order_number) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <button type="submit" class="btn btn-sm btn-primary mt-2">Completed</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ $shippingStatus === 'shipped' ? 'info' : 'secondary' }}">
                                        {{ ucwords($shippingStatus) }}
                                    </span>
                                    @if ($shippingStatus === "pending" && $paymentStatus === "paid" )
                                        <form action="{{ route('admin.orderManagement.updateShippingStatus', $firstOrder->order_number) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <button type="submit" class="btn btn-sm btn-primary mt-2">Completed</button>
                                        </form>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <x-delete-modal 
                                        id="{{ $firstOrder->order_number }}" 
                                        name="{{ $firstOrder->order_number }}" 
                                        action="{{ route('admin.orderManagement.destroy', $firstOrder->order_number) }}"
                                    /> 
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-5 text-muted">
                                    <i class="fa-solid fa-bell-slash me-2"></i> No orders found matching your criteria.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div> 


    <div class="d-flex justify-content-between align-items-center mt-3">
        <small class="text-muted">
            Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} entries
        </small>
        
        <nav>
            {{ $orders->links("pagination::livewire-bootstrap") }}
        </nav>
    </div>
</div>