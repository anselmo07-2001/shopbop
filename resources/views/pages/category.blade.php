<x-layout>
    <div class="container my-5">
        <div class="row">
            <!-- Left Sidebar: Categories -->
            <div class="col-md-3">
                <h5>Categories</h5>
                <div class="list-group ">
                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#menSub" role="button" aria-expanded="false" aria-controls="menSub">
                        Men
                        <i class="bi bi-plus"></i>
                    </a>
                    <div class="collapse ps-3" id="menSub">
                        <a href="#" class="list-group-item list-group-item-action">Men Shoes</a>
                        <a href="#" class="list-group-item list-group-item-action">Men Accessories</a>
                        <a href="#" class="list-group-item list-group-item-action">Men Shirts</a>
                    </div>

                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#womenSub" role="button" aria-expanded="false" aria-controls="womenSub">
                        Women
                        <i class="bi bi-plus"></i>
                    </a>
                    <div class="collapse ps-3" id="womenSub">
                        <a href="#" class="list-group-item list-group-item-action">Women Shoes</a>
                        <a href="#" class="list-group-item list-group-item-action">Women Accessories</a>
                        <a href="#" class="list-group-item list-group-item-action">Women Blouses</a>
                    </div>

                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#kidsSub" role="button" aria-expanded="false" aria-controls="kidsSub">
                        Kids
                        <i class="bi bi-plus"></i>
                    </a>
                    <div class="collapse ps-3" id="kidsSub">
                        <a href="#" class="list-group-item list-group-item-action">Kids Shoes</a>
                        <a href="#" class="list-group-item list-group-item-action">Kids Clothing</a>
                    </div>
                </div>
            </div>

            @if ($category_products->count())
                <div class="col-md-9">
                    <h4 class="mb-4">Category: <span class="text-primary">{{ $value }}</span></h4>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                    
                        @foreach ($category_products as $category_product)
                            <div class="col">
                                <div class="card text-center h-100">
                                    <img src="{{ asset('storage/products/' . $category_product->featured_photo ) }}" class="card-img-top" alt="Women's Casual V-Neck Blouse">
                                    <div class="card-body bg-light">
                                        <p class="card-text">{{ $category_product->name }}</p>
                                        <p class="mb-2">
                                            <span class="text-primary fs-5"><strong>${{ $category_product->current_price }}</strong></span>
                                            <span class="text-muted"><del>${{ $category_product->original_price }}</del></span>
                                        </p>
                                        <a href="{{ route('product.show', $category_product->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>       
                        @endforeach


                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation example" class="mt-4">
                          {{ $category_products->links('vendor.pagination.custom') }}
                    </nav>
                </div>
            @else
                <div class="col-md-9">
                    <div class="text-center py-5 my-4 border rounded bg-light">
                        <div class="mb-3">
                            <i class="bi bi-box-seam text-muted" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold text-muted">No Products Available</h5>
                        <p class="text-muted mb-0">
                            We couldn’t find any products for this section. Try exploring other categories.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>