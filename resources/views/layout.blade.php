<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/uploads/favicon.png">

    <!-- Stylesheets -->
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap 5 JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">


    <title>ShopBop - Home</title>
    <meta name="keywords" content="your,keywords,here">
    <meta name="description" content="Your site description here">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"></script> -->


    </head>
<body>

    <!-- Top Bar -->
    <div class="bg-dark border-bottom py-2">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-md-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item text-white"><i class="fas fa-phone"></i> +6395689287 </li>
                    <li class="list-inline-item text-white"><i class="fas fa-envelope"></i> support@shopbop.com</li>
                </ul>
            </div>
            <div class="col-md-6 text-md-end mt-2 mt-md-0">
               <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f text-white"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter text-white"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram text-white"></i></a></li>
                </ul>
            </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="py-3 bg-light border-bottom">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between flex-wrap">

            <!-- Logo -->
            <div class="logo">
                <a href="index.html" class="d-inline-block">
                    <img src="{{ asset('storage/uploads/logo2.png') }}" alt="logo image" class="img-fluid" style="max-width: 150px;">           
                </a>
            </div>

            <!-- Links + Search -->
            <div class="d-flex align-items-center flex-wrap gap-3">

                <!-- Links -->
                <ul class="list-inline mb-0 me-3">
                <li class="list-inline-item">
                    <a href="login.html" class="text-black text-decoration-none">
                    <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="registration.html" class="text-black text-decoration-none">
                    <i class="fas fa-user-plus"></i> Register
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="cart.html" class="text-black text-decoration-none">
                    <i class="fas fa-shopping-cart"></i> Cart (₱0.00)
                    </a>
                </li>
                </ul>

                <!-- Search -->
                <form class="d-flex" role="search" action="search-result.html" method="get">
                <input class="form-control me-2" type="search" placeholder="Search products..." name="search_text">
                <button class="btn btn-danger" type="submit">Search</button>
                </form>

            </div>

            </div>
        </div>
    </header>



    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            
            <!-- Brand for small screens -->
            <a class="navbar-brand d-lg-none" href="index.html">Menu</a>

            <!-- Toggler / Hamburger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-start" id="mainNav">
                <ul class="navbar-nav mb-2 mb-lg-0 gap-3">
                    <li class="nav-item"><a class="nav-link text-white" href="index.html">Home</a></li>
                    
                
                    <li class="nav-item dropdown position-static">
                            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Men
                            </a>
                            <div class="dropdown-menu mt-0 p-4 border-0 rounded-0 shadow">
                                <div class="container">
                                <div class="row">

                                    <!-- Column 1 -->
                                    <div class="col-md-3">
                                    <h6 class="fw-bold border-bottom pb-2">Men Accessories</h6>
                                    <a class="dropdown-item" href="#">Headwear</a>
                                    <a class="dropdown-item" href="#">Sunglasses</a>
                                    <a class="dropdown-item" href="#">Watches</a>
                                    <a class="dropdown-item" href="#">Belts</a>
                                    <a class="dropdown-item" href="#">Multipacks</a>
                                    <a class="dropdown-item" href="#">Other Accessories</a>
                                    </div>

                                    <!-- Column 2 -->
                                    <div class="col-md-3">
                                    <h6 class="fw-bold border-bottom pb-2">Men's Shoes</h6>
                                    <a class="dropdown-item" href="#">Sandals</a>
                                    <a class="dropdown-item" href="#">Boots</a>
                                    <a class="dropdown-item" href="#">Sports Shoes</a>
                                    <a class="dropdown-item" href="#">Casual Shoes</a>
                                    <a class="dropdown-item" href="#">Formal Shoes</a>
                                    </div>

                                    <!-- Column 3 -->
                                    <div class="col-md-3">
                                    <h6 class="fw-bold border-bottom pb-2">Bottoms</h6>
                                    <a class="dropdown-item" href="#">Pants</a>
                                    <a class="dropdown-item" href="#">Jeans</a>
                                    <a class="dropdown-item" href="#">Joggers</a>
                                    <a class="dropdown-item" href="#">Shorts</a>
                                    </div>

                                    <!-- Column 4 -->
                                    <div class="col-md-3">
                                    <h6 class="fw-bold border-bottom pb-2">T-shirts & Shirts</h6>
                                    <a class="dropdown-item" href="#">T-shirts</a>
                                    <a class="dropdown-item" href="#">Casual Shirts</a>
                                    <a class="dropdown-item" href="#">Formal Shirts</a>
                                    <a class="dropdown-item" href="#">Polo Shirts</a>
                                    <a class="dropdown-item" href="#">Vests</a>
                                    </div>

                                </div>
                                </div>
                            </div>
                            </li>

                    <li class="nav-item"><a class="nav-link text-white" href="category.html">Woman</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="about.html">Kids</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="faq.html">Electronics</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="contact.html">Health and Household</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="about.html">About Us</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="faq.html">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="contactus.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>



 


    <div id="bootstrap-touch-slider" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>


        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active" 
                 style="background-image:url('{{ asset('storage/uploads/slider-1.png') }}'); 
                        background-size:cover; 
                        background-position:center;">
                <div class="bs-slider-overlay"></div>
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="slide-text text-center text-white">
                        <h1 data-animation="animated zoomInLeft" class="display-1">Welcome to ShopBop</h1>
                        <p data-animation="animated fadeInLeft" class="fs-4">Your one-stop shop for everything you love.</p>
                        <a href="#" class="btn btn-danger" data-animation="animated fadeInLeft">Shop Now</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" 
                style="background-image:url('{{ asset('storage/uploads/slider-2.jpg') }}'); 
                       background-size:cover; 
                       background-position:center;">
                <div class="bs-slider-overlay"></div>
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="slide-text text-center text-white">
                        <h1 data-animation="animated flipInX" class="display-1">Latest Collections</h1>
                        <p data-animation="animated fadeInDown" class="fs-4">Check out our newest arrivals today!</p>
                        <a href="#" class="btn btn-danger" data-animation="animated fadeInDown">Browse</a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" 
                 style="background-image:url('{{ asset('storage/uploads/slider-3.png') }}'); 
                        background-size:cover; 
                        background-position:center;">
                <div class="bs-slider-overlay"></div>
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="slide-text text-center text-white">
                        <h1 data-animation="animated zoomInRight" class="display-1">Hot Deals</h1>
                        <p data-animation="animated fadeInRight" class="fs-4">Don’t miss out on our exclusive discounts.</p>
                        <a href="#" class="btn btn-danger" data-animation="animated fadeInRight">Grab Deal</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bootstrap-touch-slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>





    <div class="service bg-light py-5">
        <div class="container">
            <div class="row g-4">

                <!-- Service Item -->
                <div class="col-6 col-md-4">
                    <div class="item text-center">
                        <div class="photo mb-3">
                            <img src="{{ asset('storage/uploads/service-5.png') }}" alt="Easy Returns" width="150" class="img-fluid">
                        </div>
                        <h3>Easy Returns</h3>
                        <p>Return any item before 15 days!</p>
                    </div>
                </div>

                <!-- Service Item -->
                <div class="col-6 col-md-4">
                    <div class="item text-center">
                        <div class="photo mb-3">
                            <img src="{{ asset('storage/uploads/service-6.png') }}" alt="Free Shipping" width="150" class="img-fluid">
                        </div>
                        <h3>Free Shipping</h3>
                        <p>Enjoy free shipping inside US.</p>
                    </div>
                </div>

                <!-- Service Item -->
                <div class="col-6 col-md-4">
                    <div class="item text-center">
                        <div class="photo mb-3">
                            <img src="{{ asset('storage/uploads/service-7.png') }}" alt="Fast Shipping" width="150" class="img-fluid">
                        </div>
                        <h3>Fast Shipping</h3>
                        <p>Items are shipped within 24 hours.</p>
                    </div>
                </div>

                <!-- Service Item -->
                <div class="col-6 col-md-4">
                    <div class="item text-center">
                        <div class="photo mb-3">
                            <img src="{{ asset('storage/uploads/service-8.png') }}" alt="Satisfaction Guarantee" width="150" class="img-fluid">
                        </div>
                        <h3>Satisfaction Guarantee</h3>
                        <p>We guarantee you with our quality satisfaction.</p>
                    </div>
                </div>

                <!-- Service Item -->
                <div class="col-6 col-md-4">
                    <div class="item text-center">
                        <div class="photo mb-3">
                            <img src="{{ asset('storage/uploads/service-9.png') }}" alt="Secure Checkout" width="150" class="img-fluid">
                        </div>
                        <h3>Secure Checkout</h3>
                        <p>Providing Secure Checkout Options for all</p>
                    </div>
                </div>

                <!-- Service Item -->
                <div class="col-6 col-md-4">
                    <div class="item text-center">
                        <div class="photo mb-3">
                            <img src="{{ asset('storage/uploads/service-10.png') }}" alt="Money Back Guarantee" width="150" class="img-fluid">
                        </div>
                        <h3>Money Back Guarantee</h3>
                        <p>Offer money back guarantee on our products</p>
                    </div>
                </div>

            </div>
        </div>
    </div>





<!-- Top Feature Product -->
    
<div class="container my-5">
    <div class="row text-center mb-4">
        <div class="col">
            <h3><strong>Featured Products</strong></h3>
            <p class="text-muted">Our list of Top Featured Products</p>
        </div>
    </div>

    <!-- Slider Wrapper -->
    <div class="position-relative">
        <div class="d-flex overflow-hidden productSlider">
     
            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-91.jpg') }}" class="card-img-top" alt="Women's Casual V-Neck Blouse">
                <div class="card-body bg-light">
                    <p class="card-text">Women's Casual V-Neck Blouse</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$89</strong></span>
                        <span class="text-muted"><del>$115</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
    
            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-92.jpg') }}" class="card-img-top" alt="Men's Short Sleeve Polo Shirt">
                <div class="card-body bg-light">
                    <p class="card-text">Men's Short Sleeve Polo Shirt</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$95</strong></span>
                        <span class="text-muted"><del>$120</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>

            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-93.jpg') }}" class="card-img-top" alt="Women's Classic Silk Blouse">
                <div class="card-body bg-light">
                    <p class="card-text">Women's Classic Silk Blouse</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$159</strong></span>
                        <span class="text-muted"><del>$185</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
    
            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-94.jpg') }}" class="card-img-top" alt="Men's Slim Fit Dress Shirt">
                <div class="card-body bg-light">
                    <p class="card-text">Men's Slim Fit Dress Shirt</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$125</strong></span>
                        <span class="text-muted"><del>$150</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
    
            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-95.jpg') }}" class="card-img-top" alt="Men's Cotton Casual Shirt">
                <div class="card-body bg-light">
                    <p class="card-text">Men's Cotton Casual Shirt</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$99</strong></span>
                        <span class="text-muted"><del>$130</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
    
            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-96.jpg') }}" class="card-img-top" alt="Women's Long Sleeve Cotton Blouse">
                <div class="card-body bg-light">
                    <p class="card-text">Women's Long Sleeve Cotton Blouse</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$119</strong></span>
                        <span class="text-muted"><del>$145</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
    
            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-97.jpg') }}" class="card-img-top" alt="Men's Plaid Flannel Shirt">
                <div class="card-body bg-light">
                    <p class="card-text">Men's Plaid Flannel Shirt</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$109</strong></span>
                        <span class="text-muted"><del>$140</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
        
            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-98.jpg') }}" class="card-img-top" alt="Women's Sleeveless Summer Top">
                <div class="card-body bg-light">
                    <p class="card-text">Women's Sleeveless Summer Top</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$85</strong></span>
                        <span class="text-muted"><del>$110</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
        
            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-91.jpg') }}" class="card-img-top" alt="Women's Casual V-Neck Blouse">
                <div class="card-body bg-light">
                    <p class="card-text">Women's Casual V-Neck Blouse</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$89</strong></span>
                        <span class="text-muted"><del>$115</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
        
            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-92.jpg') }}" class="card-img-top" alt="Men's Short Sleeve Polo Shirt">
                <div class="card-body bg-light">
                    <p class="card-text">Men's Short Sleeve Polo Shirt</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$95</strong></span>
                        <span class="text-muted"><del>$120</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>

            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-93.jpg') }}" class="card-img-top" alt="Women's Classic Silk Blouse">
                <div class="card-body bg-light">
                    <p class="card-text">Women's Classic Silk Blouse</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$159</strong></span>
                        <span class="text-muted"><del>$185</del></span>
                    </p>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                </div>
            </div>
    
            <div class="card text-center me-3" style="min-width: 18rem;">
                <img src="{{ asset('storage/uploads/product-featured-94.jpg') }}" class="card-img-top" alt="Men's Slim Fit Dress Shirt">
                <div class="card-body bg-light">
                    <p class="card-text">Men's Slim Fit Dress Shirt</p>
                    <p class="mb-2">
                        <span class="text-primary fs-5"><strong>$125</strong></span>
                        <span class="text-muted"><del>$150</del></span>
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



<!-- Top Feature Product -->
<div class="bg-light py-3">
    <div class="container my-5">
        <div class="row text-center mb-4">
            <div class="col">
                <h3><strong>Latest Products</strong></h3>
                <p class="text-muted">Our list of recently added products</p>
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



<!-- Top Popular Product -->
<div class="py-3">
    <div class="container my-5">
        <div class="row text-center mb-4">
            <div class="col">
                <h3><strong>Popular Products</strong></h3>
                <p class="text-muted">Popular products based on customer's choice</p>
            </div>
        </div>

        <!-- Slider Wrapper -->
        <div class="position-relative">
            <div class="d-flex overflow-hidden productSlider">
                  
                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-99.jpg') }}" class="card-img-top" alt="Men's Formal White Dress Shirt">
                    <div class="card-body bg-light">
                        <p class="card-text">Men's Formal White Dress Shirt</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$135</strong></span>
                            <span class="text-muted"><del>$160</del></span>
                        </p>
                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                    </div>
                </div>
       

                <div class="card text-center me-3" style="min-width: 18rem;">
                    <img src="{{ asset('storage/uploads/product-featured-100.jpg') }}" class="card-img-top" alt="Women's Elegant Office Shirt">
                    <div class="card-body bg-light">
                        <p class="card-text">Women's Elegant Office Shirt</p>
                        <p class="mb-2">
                            <span class="text-primary fs-5"><strong>$145</strong></span>
                            <span class="text-muted"><del>$170</del></span>
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


<!-- Newsletter Section -->
<section class="home-newsletter py-5 bg-dark">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <div class="text-center">
          <form action="#" method="post">
            <h2 class="mb-4 text-white">Subscribe to our Newsletter</h2>
            <div class="input-group">
              <input type="email" class="form-control" placeholder="Enter your email" required>
              <button class="btn btn-warning" type="submit">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="footer-bottom py-3 bg-dark text-white">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        © 2025 Rivera Anselmo. All rights reserved.
      </div>
    </div>
  </div>
</footer>




<script src="{{ asset('javascript/theme.js') }}"></script>
</body>
</html>