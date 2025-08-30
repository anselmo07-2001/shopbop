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
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-layout>