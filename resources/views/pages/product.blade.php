<x-layout>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-2 rounded">
                <li class="breadcrumb-item"><a href="#" class="text-dark">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-dark">{{ $breadcrumbs->endCategory->midCategory->topCategory->name }}</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-dark">{{ $breadcrumbs->endCategory->midCategory->name }}</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-dark">{{ $breadcrumbs->endCategory->name }}</a></li>
                <li class="breadcrumb-item active text-dark"  aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>

    <div class="container my-5">
        <div class="row">
            <!-- Product Images -->
            <div class="col-md-6">
            <div class="mb-3">
                <img id="mainProductImg" src="{{ asset('storage/products/' . $product->featured_photo ) }}" class="img-fluid border rounded" alt="Amazfit GTS 3">
            </div>
            <div class="d-flex gap-2">
                @foreach ($product_galleries as $photo)
                    <img src="{{ asset('storage/gallery/' . $photo->image_path) }}" class="img-thumbnail" style="width: 80px;" onclick="document.getElementById('mainProductImg').src=this.src">       
                @endforeach
            </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">{!! $product->short_description !!}</p>

            <!-- Price -->
            <p class="fs-4">
                <span class="text-primary fw-bold">${{ $product->current_price }}</span>
                <span class="text-muted text-decoration-line-through">${{ $product->original_price }}</span>
            </p>

            <!-- Size & Color -->
            <div class="mb-3">
                <label for="sizeSelect" class="form-label">Size</label>
                <select class="form-select w-50" id="sizeSelect">
                    <option selected>Choose Size</option>
                        @foreach ($product_sizes as $item)
                            <option value={{ $item->size->id }} >{{ $item->size->name }}</option>
                        @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="colorSelect" class="form-label">Color</label>
                <select class="form-select w-50" id="colorSelect">
                    <option selected>Choose Color</option>
                        @foreach ($product_colors as $item)
                            <option value={{ $item->color->id }} >{{ $item->color->name }}</option>
                        @endforeach
                </select>
            </div>

            <!-- Quantity & Add to Cart -->
            <div class="mb-3 d-flex gap-2">
                <input type="number" class="form-control w-auto" value="1" min="1">
                <button class="btn btn-warning"><i class="bi bi-cart-plus"></i> Add to Cart</button>
            </div>

            <!-- Social Share -->
            <div>
                <span>Share: </span>
                <a href="#" class="text-primary me-2"><i class="bi bi-facebook fs-4"></i></a>
                <a href="#" class="text-info me-2"><i class="bi bi-twitter fs-4"></i></a>
                <a href="#" class="text-danger me-2"><i class="bi bi-pinterest fs-4"></i></a>
                <a href="#" class="text-secondary"><i class="bi bi-envelope fs-4"></i></a>
            </div>
            </div>
        </div>
    </div>





    <div class="container my-5">
        <ul class="nav nav-tabs" id="productTab" role="tablist">
            <li class="nav-item" role="presentation">
            <button class="nav-link active border text-dark" 
                    id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">
                Description
            </button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link border-0 text-dark" 
                    id="features-tab" data-bs-toggle="tab" data-bs-target="#features" type="button" role="tab">
                Features
            </button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link border-0 text-dark" 
                    id="condition-tab" data-bs-toggle="tab" data-bs-target="#condition" type="button" role="tab">
                Condition
            </button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link border-0 text-dark" 
                    id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" role="tab">
                Return Policy
            </button>
            </li>
        </ul>

    <!-- Tab Content -->
        <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="description" role="tabpanel">
                    {!! $product->description !!}
                </div>
                <div class="tab-pane fade" id="features" role="tabpanel">
                   {!! $product->features !!}
                </div>
                <div class="tab-pane fade" id="condition" role="tabpanel">
                    {!! $product->condition !!}
                </div>
                <div class="tab-pane fade" id="return" role="tabpanel">
                    {!! $product->return_policy !!}
                </div>
                </div>
            </div>
        </div>
    </div>

        <x-customer-review/>
   
        <x-add-review/>

        <x-related-products/>

    </div>
</x-layout>