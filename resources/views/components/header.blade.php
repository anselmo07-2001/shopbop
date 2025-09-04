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
            <a href="{{ route('home') }}" class="d-inline-block">
                <img src="{{ asset('storage/uploads/logo2.png') }}" alt="logo image" class="img-fluid" style="max-width: 150px;">           
            </a>
        </div>

        <!-- Links + Search -->
        <div class="d-flex align-items-center flex-wrap gap-3">

            <!-- Links -->
            <ul class="list-inline mb-0 me-3">
               @auth("customer")
                   <li class="list-inline-item">
                        <form method="POST" action="{{ route('logout.customer') }}" class="text-black text-decoration-none">
                            @csrf
                            <button type="submit" class="btn btn-link text-black text-decoration-none p-0 m-0 align-baseline">
                                <i class="fas fa-sign-out-alt"></i  > Logout
                            </button>
                        </form>
                    </li>
               @endauth

                @guest("customer")
                    <li class="list-inline-item">
                        <a href="{{ route('login') }}" class="text-black text-decoration-none">
                        <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('register') }}" class="text-black text-decoration-none">
                        <i class="fas fa-user-plus"></i> Register
                        </a>
                    </li>        
                @endguest

                <li class="list-inline-item">
                    <a href="{{ route('cart.index') }}" class="text-black text-decoration-none">
                        <i class="fas fa-shopping-cart"></i> Cart (${{ number_format($cartTotal, 2) }})
                    </a>
                </li>  
            </ul>

            <!-- Search -->
            <form class="d-flex" role="search" action="{{ route('product.search') }}" method="get">
                <input class="form-control me-2" type="search" placeholder="Search products..." name="search_text">
                <button class="btn btn-danger" type="submit">Search</button>
            </form>

        </div>

        </div>
    </div>
</header>



<!-- Navigation -->
<x-sub-menu/>