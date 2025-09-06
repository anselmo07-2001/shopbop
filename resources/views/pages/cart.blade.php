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
        <h4 class="mb-4 text-secondary text-center">Shopping Cart</h4>

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
                                    <form method="POST" action="{{ route('cart.update', $item['cart_item_id']) }}" class="d-flex gap-1">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                                        <input type="number" name="quantity" class="form-control form-control-sm" value="{{ $item['quantity'] }}" min="1" style="width:70px;">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('cart.destroy', $item['cart_item_id']) }}">
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
                    <tr class="table-light">
                        <td colspan="6" class="text-end fw-bold">Total:</td>
                        <td class="fw-bold text-success">
                            ${{ collect($items)->sum('sub_total') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>

        <!-- Cart total -->
        <div class="row justify-content-end mt-2">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">  
                    <div class="d-grid gap-2">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Continue Shopping</a>
                        <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
</x-layout>