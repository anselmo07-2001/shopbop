@props(["hasBgLight" => false, "header" => "", "subTitle" => ""])


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
        
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-83.jpg') }}" class="card-img-top" alt="Button Down Shirt with Pocket">
                    <div class="card-body bg-light">
                        <p class="card-text">Button Down Shirt with Pocket</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$129</strong></span>
                            <span class="text-muted"><del>$159</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
                        
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-84.jpg') }}" class="card-img-top" alt="Women's Plus-Size Shirt Dress with Gold Hardware">
                    <div class="card-body bg-light">
                        <p class="card-text">Women's Plus-Size Shirt Dress with Gold Hardware</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$169</strong></span>
                            <span class="text-muted"><del>$190</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
                    
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-85.jpg') }}" class="card-img-top" alt="Men's Long Sleeve Linen Shirt">
                    <div class="card-body bg-light">
                        <p class="card-text">Men's Long Sleeve Linen Shirt</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$110</strong></span>
                            <span class="text-muted"><del>$145</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
                        
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-86.jpg') }}" class="card-img-top" alt="Slim Fit Stretch Dress Shirt">
                    <div class="card-body bg-light">
                        <p class="card-text">Slim Fit Stretch Dress Shirt</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$139</strong></span>
                            <span class="text-muted"><del>$160</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
                        
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-87.jpg') }}" class="card-img-top" alt="Classic Fit Cotton Polo Shirt">
                    <div class="card-body bg-light">
                        <p class="card-text">Classic Fit Cotton Polo Shirt</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$89</strong></span>
                            <span class="text-muted"><del>$120</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
                    
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-88.jpg') }}" class="card-img-top" alt="Men's Wrinkle-Free Dress Shirt">
                    <div class="card-body bg-light">
                        <p class="card-text">Men's Wrinkle-Free Dress Shirt</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$115</strong></span>
                            <span class="text-muted"><del>$150</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
            
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-89.jpg') }}" class="card-img-top" alt="Short Sleeve Chambray Shirt">
                    <div class="card-body bg-light">
                        <p class="card-text">Short Sleeve Chambray Shirt</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$99</strong></span>
                            <span class="text-muted"><del>$125</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
                    
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-90.jpg') }}" class="card-img-top" alt="Men's Classic Oxford Shirt">
                    <div class="card-body bg-light">
                        <p class="card-text">Men's Classic Oxford Shirt</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$105</strong></span>
                            <span class="text-muted"><del>$140</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>   
                
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-83.jpg') }}" class="card-img-top" alt="Button Down Shirt with Pocket">
                    <div class="card-body bg-light">
                        <p class="card-text">Button Down Shirt with Pocket</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$129</strong></span>
                            <span class="text-muted"><del>$159</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
                        
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-84.jpg') }}" class="card-img-top" alt="Women's Plus-Size Shirt Dress with Gold Hardware">
                    <div class="card-body bg-light">
                        <p class="card-text">Women's Plus-Size Shirt Dress with Gold Hardware</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$169</strong></span>
                            <span class="text-muted"><del>$190</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
                    
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-85.jpg') }}" class="card-img-top" alt="Men's Long Sleeve Linen Shirt">
                    <div class="card-body bg-light">
                        <p class="card-text">Men's Long Sleeve Linen Shirt</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$110</strong></span>
                            <span class="text-muted"><del>$145</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
                        
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-86.jpg') }}" class="card-img-top" alt="Slim Fit Stretch Dress Shirt">
                    <div class="card-body bg-light">
                        <p class="card-text">Slim Fit Stretch Dress Shirt</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$139</strong></span>
                            <span class="text-muted"><del>$160</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
            </div>  

            <!-- Navigation Buttons -->
            <button class="prevBtn btn btn-dark position-absolute top-50 start-0 translate-middle-y" style="border-radius:0;">&#10094;</button>
            <button class="nextBtn btn btn-dark position-absolute top-50 end-0 translate-middle-y" style="border-radius:0;">&#10095;</button>
        </div>
    </div>
</div>