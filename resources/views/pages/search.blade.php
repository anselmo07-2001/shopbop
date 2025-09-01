<x-layout>
    <div class="container my-5">
        <h3 class="mb-4 text-center">Search: <span class="text-primary">{{ $term }}</span></h3>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row row-cols-1 row-cols-md-3 g-4">    
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card text-center h-100">
                                <img src="{{ asset('storage/products/' . $product->featured_photo ) }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body bg-light">
                                    <p class="card-text">{{ $product->name }}</p>
                                    <p class="mb-2">
                                        <span class="text-primary fs-5"><strong>${{ $product->current_price }}</strong></span>
                                        <span class="text-muted"><del>${{ $product->original_price }}</del></span>
                                    </p>
                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach     
                </div>         
            </div>
        </div>

        <nav aria-label="Page navigation" class="mt-4">
                {{ $products->links('vendor.pagination.custom') }}
        </nav>
    </div>
</x-layout>