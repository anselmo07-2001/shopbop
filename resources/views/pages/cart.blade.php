<x-layout>
    @if(session('success'))
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-init="setTimeout(() => show = false, 5000 )" 
            class="alert alert-success text-center"
            style="margin-bottom: 0"
        >
            {{ session('success') }}
        </div>
    @endif


    <div class="container my-5">
        <h4 class="mb-4 text-secondary">Shopping Cart</h4>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Size</th>
                    <th scope="col">Color</th>
                    <th scope="col">Price</th>
                    <th scope="col" style="width:120px;">Quantity / Action</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)         
                        <tr>
                            <td>
                                <img src="{{ asset('storage/products/' . $item['product']->featured_photo ) }}" class="img-thumbnail" style="width:80px;" alt="Product">
                            </td>
                            <td>{{ $item["product"]->name }}</td>
                            <td>{{ $item["size"] }}</td>
                            <td>{{ $item["color"] }}</td>
                            <td>${{ $item["product"]->current_price }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="POST" action="{{ route('cart.update', $item['product']->id) }}" class="d-flex gap-1">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                                        <input type="number" name="quantity" class="form-control form-control-sm" value="{{ $item['quantity'] }}" min="1" style="width:70px;">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('cart.destroy', $item['product']->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                ${{ $item["sub_total"] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>

        <!-- Cart total -->
        <div class="row justify-content-end">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Subtotal</span>
                            <strong>${{ $total }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Shipping</span>
                            <strong>$15</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Tax</span>
                            <strong>$0</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                            <span>Total</span>
                            <strong class="text-success">$542</strong>
                        </li>
                        </ul>

                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-secondary">Continue Shopping</a>
                            <a href="#" class="btn btn-success">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layout>