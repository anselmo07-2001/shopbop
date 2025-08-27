@props(["hasBgLight" => false, "header" => "", "subTitle" => "", "products" => [] ])


<div class="py-3 {{ $hasBgLight ? 'bg-light' : '' }} ">
    <div class="container my-5">
        <div class="row text-center mb-4">
            <div class="col">
                <h3><strong> {{ $header }} </strong></h3>
                <p class="text-muted"> {{ $subTitle}} </p>
            </div>
        </div>

        <!-- Slider Wrapper -->
        <div class="position-relative">
            <div class="d-flex overflow-hidden productSlider">

                @foreach ($products as $product)
                    <div class="card text-center me-3" style="min-width: 18rem;">
                        <img src="{{ asset('storage/products/' . $product->featured_photo) }}" class="card-img-top" alt="Button Down Shirt with Pocket">
                        <div class="card-body bg-light">
                            <p class="card-text">{{ $product->name }}</p>
                            <p class="mb-2">
                                <span class="text-primary fs-5"><strong>{{ $product->current_price }}</strong></span>
                                <span class="text-muted"><del>{{ $product->original_price }}</del></span>
                            </p>
                            <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                        </div>
                    </div>
                @endforeach
                        
                <!-- Navigation Buttons -->
                <button class="prevBtn btn btn-dark position-absolute top-50 start-0 translate-middle-y" style="border-radius:0;">&#10094;</button>
                <button class="nextBtn btn btn-dark position-absolute top-50 end-0 translate-middle-y" style="border-radius:0;">&#10095;</button>
            </div>
        </div>
    </div>
</div>