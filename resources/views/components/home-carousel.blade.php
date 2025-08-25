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