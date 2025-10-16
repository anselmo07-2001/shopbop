<x-layout>
    @if(session('failed'))
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-init="setTimeout(() => show = false, 5000 )" 
            class="alert alert-danger text-center"
            style="margin-bottom: 0"
        >
            {{ session('failed') }}
        </div>
    @endif

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



    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-2 rounded">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('category.index', 
                             [  'level' => 'top_category', 
                                'id' => $breadcrumbs->endCategory->midCategory->topCategory->id, 
                                'value' => $breadcrumbs->endCategory->midCategory->topCategory->name] ) }}" 
                       class="text-dark">
                            {{ $breadcrumbs->endCategory->midCategory->topCategory->name }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('category.index', 
                             [  'level' => 'mid_category', 
                                'id' => $breadcrumbs->endCategory->midCategory->id, 
                                'value' => $breadcrumbs->endCategory->midCategory->name] ) }}" 
                       class="text-dark">
                            {{ $breadcrumbs->endCategory->midCategory->name }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('category.index', 
                             [  'level' => 'end_category', 
                                'id' => $breadcrumbs->endCategory->id, 
                                'value' => $breadcrumbs->endCategory->name] ) }}" 
                       class="text-dark">
                            {{ $breadcrumbs->endCategory->name }}
                    </a>
                </li>
                <li class="breadcrumb-item active text-dark"  aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>

    <div class="container my-5">
        <div class="row d-flex align-items-start">
            <!-- Product Images -->
            <div class="col-md-6 d-flex flex-column justify-content-start ml-3">
                <div class="mb-3" style="width: 450px; height: 450px;">
                    <img 
                        id="mainProductImg" 
                        src="{{ asset('storage/products/' . $product->featured_photo ) }}" 
                        class="img-fluid border rounded" 
                        alt="{{ $product->name }}"
                        style="width:100%; height:100%; object-fit:cover;"
                    >
                </div>
                <div class="d-flex gap-2">
                    @foreach ($product_galleries as $photo)
                        <img src="{{ asset('storage/gallery/' . $photo->image_path) }}" class="img-thumbnail" 
                            style="width: 80px; cursor: pointer;" onclick="document.getElementById('mainProductImg').src=this.src">       
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
                <form method="POST" action="{{ route('cart.add', $product->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="sizeSelect" class="form-label">Size</label>
                        <select name="size" class="form-select w-50" id="sizeSelect">
                            <option value="" {{ old('size') == '' ? 'selected' : '' }}>
                                    Choose Size
                            </option>
                            @foreach ($product_sizes as $item)
                                <option value="{{ $item->size->name }}"
                                        {{ old('size') == $item->size->name ? "selected" : ""  }}
                                    >{{ $item->size->name }}
                                </option>
                            @endforeach
                        </select>
                        @error("size")
                            <div class="text-danger mt-1" style="font-size: 13px">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="colorSelect" class="form-label">Color</label>
                        <select name="color" class="form-select w-50" id="colorSelect">
                            <option selected value="">Choose Color</option>
                                @foreach ($product_colors as $item)
                                    <option value="{{ $item->color->name }}"
                                            {{ old('color') == $item->color->name ? "selected" : "" }}>
                                        {{ $item->color->name }}
                                    </option>
                                @endforeach
                        </select>
                        @error("color")
                            <div class="text-danger mt-1" style="font-size: 13px">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <!-- Quantity & Add to Cart -->
                    <span class="pb-2 d-block">Stocks: {{ $product->quantity }} </span>
                    <div class="mb-1 d-flex gap-2">
                        <input name="quantity" type="number" class="form-control w-auto" value="{{ old('quantity', 1) }}" min="1">
                        <button type="submit" class="btn btn-warning"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    </div>
                    @error("quantity")
                            <div class="text-danger" style="font-size: 13px">{{ $message }}</div>
                    @enderror
                </form>

                <!-- Social Share -->
                <div class="mt-3">
                    <span class="pe-2">Share: </span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('product.show', $product->id)) }}" 
                       class="btn btn-primary">
                            <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode('Check out this product!') }}&url={{ urlencode(route('product.show', $product->id)) }}"
                       class="btn btn-info">
                        <i class="fa-brands fa-x-twitter text-dark"></i>
                    </a>
                    <a href="mailto:?subject={{ urlencode('Check out this product!') }}&body={{ urlencode('Take a look at this product: ' . route('product.show', $product->id)) }}" 
                       class="btn btn-secondary">
                        <i class="fas fa-envelope"></i>
                    </a>
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

        <x-customer-review :ratings="$ratings" :product="$product"/>
   
        @if (auth("customer")->check() && $has_purchased )
            <x-add-review :reviewed="$reviewed" :product_id="$product->id"/>      
        @endif

        <x-related-products :relatedProducts="$relatedProducts" :endCategory="$breadcrumbs->endCategory"/>

    </div>
</x-layout>