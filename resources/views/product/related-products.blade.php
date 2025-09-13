@props(["relatedProducts" => [], "endCategory" => [] ])

<div class="container my-5">

    @if (!empty($relatedProducts) && count($relatedProducts) > 0)
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Related Products</h5>
            <a href="{{ route('category.index', ['level' => 'end_category', 'id' => $endCategory->id, 'value' => $endCategory->name] ) }}"
            class="text-decoration-none">See All</a>
        </div>
    @endif

    <div class="d-flex overflow-auto py-2">    
        @if (!empty($relatedProducts) && count($relatedProducts) > 0)
            @foreach ($relatedProducts as $relatedProduct)
                <div class="card text-center me-3 h-100" style="width: 20rem;">
                    <img src="{{ asset('storage/products/' . $relatedProduct->featured_photo) }}" 
                        class="card-img-top img-fluid" 
                        alt="{{ $relatedProduct->name }}">
                    <div class="card-body bg-light d-flex flex-column">
                        <p class="card-text flex-grow-1">{{ $relatedProduct->name }}</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5">
                                <strong>${{ number_format($relatedProduct->current_price, 2) }}</strong>
                            </span>
                            <span class="text-muted">
                                <del>${{ number_format($relatedProduct->original_price, 2) }}</del>
                            </span>
                        </p>
                        <div class="mt-auto">
                            <a href="{{ route('product.show', $relatedProduct->id) }}" 
                            class="btn btn-warning btn-sm d-inline-flex justify-content-center align-items-center mx-auto" 
                            style="width: 120px;">
                                <i class="bi bi-cart-plus">Add to Cart</i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-secondary text-center w-100">
                 No related products available.
            </div>  
        @endif
    </div>
</div>