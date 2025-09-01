<x-layout>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <h5>Categories</h5>
                <div class="list-group">
                    @foreach ($sideMenu as $topCategories)
                        <div class="d-flex align-items-center list-group-item">
                            <a href="{{ route('category.index', ['top_category', $topCategories->id, $topCategories->name] )}}" 
                               class="flex-grow-1 text-decoration-none text-dark">
                                {{ $topCategories->name }}
                            </a>
                            <button class="btn btn-link p-0 ms-2 text-secondary" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#top-{{ $topCategories->id }}" aria-expanded="false" aria-controls="top-{{ $topCategories->id }}">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>

                        <div class="collapse ps-3" id="top-{{ $topCategories->id }}">
                            @foreach ($topCategories->midCategories as $midCategories)
                                <div class="d-flex align-items-center list-group-item">
                                    <a href="{{ route('category.index', ['mid_category', $midCategories->id, $midCategories->name] )}}" 
                                       class="flex-grow-1 text-decoration-none text-dark">{{ $midCategories->name }}</a>
                                    <button class="btn btn-link p-0 ms-2 text-secondary" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#mid-{{ $midCategories->id }}" aria-expanded="false" aria-controls="mid-{{ $midCategories->id }}">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>          
                                <div class="collapse ps-3" id="mid-{{ $midCategories->id }}">
                                    @foreach ($midCategories->endCategories as $endCategories)
                                        <a href="{{ route('category.index', ['end_category', $endCategories->id, $endCategories->name] )}}" 
                                           class="list-group-item list-group-item-action">{{ $endCategories->name }}</a>
                                    @endforeach
                                </div>                       
                            @endforeach
                        </div>
                    @endforeach
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
                    <nav aria-label="Page navigation" class="mt-4">
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